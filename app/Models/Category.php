<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Category extends Model
{
    use HasFactory;

    private static $image, $imageName, $directory, $imageUrl;
     // Fillable fields to allow mass assignment
     protected $fillable = [
        'category_name',
        'category_image',
    ];

        // Function to upload and resize image
       // Function to upload and resize image
       private static function getImageUrl($request)
       {
           self::$image = $request->file('category_image');
           if (self::$image) {
               self::$imageName = time() . '_' . self::$image->getClientOriginalName(); // Unique image name
               self::$directory = "upload/category-images/";
               self::$image->move(self::$directory, self::$imageName);
       
               // Resize the image using Intervention Image
               $imageManager = new ImageManager(new Driver());
               $image = $imageManager->read(self::$directory . self::$imageName);
               $image->resize(1200, 600); // Resize to required dimensions
               $image->save(self::$directory . self::$imageName);
       
               self::$imageUrl = self::$directory . self::$imageName;
               return self::$imageUrl;
           }
           return null;
          }
              // Create a new Banner entry
    public static function newCategory($request)
    {
        self::$imageUrl = $request->file('category_image') ? self::getImageUrl($request) : '';

        $category = new self();
        self::saveBasicInfo($category, $request, self::$imageUrl);
    }

          // Update an existing category entry
public static function updateCategory($request, $id)
{
 // Fetch the team record using the ID
 $category = self::findOrFail($id);

    if ($request->file('category_image')) {
        if (file_exists($category->category_image)) {
            unlink($category->category_image);
        }
        self::$imageUrl = self::getImageUrl($request);
    } else {
        self::$imageUrl = $category->category_image;
    }

    self::saveBasicInfo($category, $request, self::$imageUrl);
    }

    // Save or update basic info in the database
   private static function saveBasicInfo($category, $request, $imageUrl)
   {
       $category->category_image                 = $imageUrl;
       $category->category_name                  = $request->category_name;
       $category->save();
   }

   // Delete an category entry
public static function deleteCategory($category)
{
    if (file_exists($category->category_image)) {
        unlink($category->category_image);
    }
    
    $category->delete();
    }
}
