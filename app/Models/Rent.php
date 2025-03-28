<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Rent extends Model
{
    use HasFactory;

    private static $image, $imageName, $directory, $imageUrl;

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'rentproperty_id',
        'rentproperty_type',
        'rent_sqrt',
        'rent_title',
        'rent_description',
        'rentproperty_status',
        'rent_rooms',
        'rentproperty_price',
        'bed_rooms',
        'garages',
        'bath_rooms',
        'rentproperty_image',
        'build_up',
    ];

            // Function to upload and resize image
private static function getImageUrl($request)
{
    self::$image = $request->file('rentproperty_image');
    if (self::$image) {
        self::$imageName = time() . '_' . self::$image->getClientOriginalName(); // Unique image name
        self::$directory = "upload/rent/";
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

       // Create a new Rent entry
       public static function newRent($request)
       {
           self::$imageUrl = $request->file('rentproperty_image') ? self::getImageUrl($request) : '';
   
           $rent = new self();
           self::saveBasicInfo($rent, $request, self::$imageUrl);
       }

               // Update an existing About entry
    public static function updateRent($request, $id)
    {
    // Fetch the team record using the ID
    $rent = self::findOrFail($id);

        if ($request->file('rentproperty_image')) {
            if (file_exists($rent->rentproperty_image)) {
            unlink($rent->rentproperty_image);
            }
        self::$imageUrl = self::getImageUrl($request);
        } else {
        self::$imageUrl = $rent->rentproperty_image;
    }

    self::saveBasicInfo($rent, $request, self::$imageUrl);
        }

          // Save or update basic info in the database
   private static function saveBasicInfo($rent, $request, $imageUrl)
   {
       $rent->rentproperty_image           = $imageUrl;
       $rent->rentproperty_id           = $request->rentproperty_id;
       $rent->rentproperty_type      = $request->rentproperty_type;
       $rent->rent_title      = $request->rent_title;
       $rent->rent_sqrt      = $request->rent_sqrt;
       $rent->rent_description            = $request->rent_description;
       $rent->rentproperty_status       = $request->rentproperty_status;
       $rent->rent_rooms           = $request->rent_rooms;
       $rent->rentproperty_price           = $request->rentproperty_price;
       $rent->bed_rooms         = $request->bed_rooms;
       $rent->garages         = $request->garages;
       $rent->bath_rooms         = $request->bath_rooms;
       $rent->build_up         = $request->build_up;
       $rent->save();
   }


   // Delete an Rent entry
public static function deleteRent($rent)
{
    if (file_exists($rent->rentproperty_image)) {
        unlink($rent->rentproperty_image);
    }
    
    $rent->delete();

}
}
