<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;

class News extends Model
{

    use HasFactory;

    private static $image, $imageName, $directory, $imageUrl;
        // Fillable fields to allow mass assignment
        protected $fillable = [
            'news_image',
            'news_title',
            'news_date',
            'news_via',
            'news_description',
        ];
    // Function to upload and resize image
    private static function getImageUrl($request)
{
    self::$image = $request->file('news_image');
    if (self::$image) {
        self::$imageName = time() . '_' . self::$image->getClientOriginalName(); // Unique image name
        self::$directory = "upload/news-images/";
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

    // Create a new News entry
    public static function newNews($request)
    {
        self::$imageUrl = $request->file('news_image') ? self::getImageUrl($request) : '';

        $news = new self();
        self::saveBasicInfo($news, $request, self::$imageUrl);
    }

        // Update an existing About entry
public static function updateNews($request, $id)
{
 // Fetch the team record using the ID
 $news = self::findOrFail($id);

    if ($request->file('news_image')) {
        if (file_exists($news->news_image)) {
            unlink($news->news_image);
        }
        self::$imageUrl = self::getImageUrl($request);
    } else {
        self::$imageUrl = $news->news_image;
    }

    self::saveBasicInfo($news, $request, self::$imageUrl);
    }

    // Save or update basic info in the database
   private static function saveBasicInfo($news, $request, $imageUrl)
   {
       $news->news_image           = $imageUrl;
       $news->news_title           = $request->news_title;
       $news->news_date            = Carbon::parse($request->news_date)->format('Y-m-d');
       $news->news_via             = $request->news_via;
       $news->news_description     = $request->news_description;
       $news->save();
   }

   
// Delete an Property entry
public static function deleteNews($news)
{
    if (file_exists($news->news_image)) {
        unlink($news->news_image);
    }
    
    $news->delete();
    }
}
