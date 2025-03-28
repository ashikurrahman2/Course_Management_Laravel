<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Property extends Model
{
    use HasFactory;

    private static $image, $imageName, $directory, $imageUrl;

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'property_image',
        'property_title',
        'property_description',
        'property_address',
        'property_elements',
        'property_bath',
        'property_sqrt',
        'property_action',
        'property_amount',
    ];

        // Function to upload and resize image
private static function getImageUrl($request)
{
    self::$image = $request->file('property_image');
    if (self::$image) {
        self::$imageName = time() . '_' . self::$image->getClientOriginalName(); // Unique image name
        self::$directory = "upload/property-images/";
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

    // Create a new About entry
    public static function newProperty($request)
    {
        self::$imageUrl = $request->file('property_image') ? self::getImageUrl($request) : '';

        $property = new self();
        self::saveBasicInfo($property, $request, self::$imageUrl);
    }

        // Update an existing About entry
public static function updateProperty($request, $id)
{
 // Fetch the team record using the ID
 $property = self::findOrFail($id);

    if ($request->file('property_image')) {
        if (file_exists($property->property_image)) {
            unlink($property->property_image);
        }
        self::$imageUrl = self::getImageUrl($request);
    } else {
        self::$imageUrl = $property->property_image;
    }

    self::saveBasicInfo($property, $request, self::$imageUrl);
}

   // Save or update basic info in the database
   private static function saveBasicInfo($property, $request, $imageUrl)
   {
       $property->property_image           = $imageUrl;
       $property->property_title           = $request->property_title;
       $property->property_description     = $request->property_description;
       $property->property_address        = $request->property_address;
       $property->property_elements       = $request->property_elements;
       $property->property_bath           = $request->property_bath;
       $property->property_sqrt           = $request->property_sqrt;
       $property->property_action         = $request->property_action;
       $property->property_amount         = $request->property_amount;
       $property->save();
   }

   
// Delete an Property entry
public static function deleteProperty($property)
{
    if (file_exists($property->property_image)) {
        unlink($property->property_image);
    }
    
    $property->delete();

}


}
