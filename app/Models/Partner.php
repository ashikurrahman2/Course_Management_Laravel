<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Partner extends Model
{
    use HasFactory;

    private static $image, $imageName, $directory, $imageUrl;
    // Fillable fields to allow mass assignment
    protected $fillable = [
        'partner_logo',
        'partner_collaborations',
    ];

     // Function to upload and resize image
     private static function getImageUrl($request)
     {
         self::$image = $request->file('partner_logo');
         if (self::$image) {
             self::$imageName = time() . '_' . self::$image->getClientOriginalName(); // Unique image name
             self::$directory = "upload/partner-images/";
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

            // Create a new Partner entry
    public static function newPartner($request)
    {
        self::$imageUrl = $request->file('partner_logo') ? self::getImageUrl($request) : '';

        $partner = new self();
        self::saveBasicInfo($partner, $request, self::$imageUrl);
    }

    
        // Update an existing About entry
public static function updatePartner($request, $id)
{
 // Fetch the team record using the ID
 $pertner = self::findOrFail($id);

    if ($request->file('partner_logo')) {
        if (file_exists($pertner->partner_logo)) {
            unlink($pertner->partner_logo);
        }
        self::$imageUrl = self::getImageUrl($request);
    } else {
        self::$imageUrl = $pertner->partner_logo;
    }

    self::saveBasicInfo($pertner, $request, self::$imageUrl);
    }

        // Save or update basic info in the database
   private static function saveBasicInfo($pertner, $request, $imageUrl)
   {
       $pertner->partner_logo                     = $imageUrl;
       $pertner->partner_collaborations           = $request->partner_collaborations;
       $pertner->save();
   }

   // Delete an Partner entry
public static function deletePartner($pertner)
{
    if (file_exists($pertner->partner_logo)) {
        unlink($pertner->partner_logo);
    }
    
    $pertner->delete();
    }
}
