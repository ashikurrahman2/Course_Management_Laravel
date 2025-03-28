<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class About extends Model
{
    use HasFactory;

    private static $image, $imageName, $directory, $imageUrl;

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'title',
        'photo',
        'signature',
        'description',
    ];

    // Function to upload and resize image
    private static function getImageUrl($imageFile, $directory)
    {
        if ($imageFile) {
            self::$imageName = time() . '_' . $imageFile->getClientOriginalName(); // Unique image name
            $path = $directory;
            $imageFile->move($path, self::$imageName);

            // Resize the image using Intervention Image
            $imageManager = new ImageManager(new Driver());
            $image = $imageManager->read($path . self::$imageName);
            $image->resize(1200, 600); // Resize to required dimensions
            $image->save($path . self::$imageName);

            return $path . self::$imageName;
        }
        return null;
    }

    // Create a new About entry
    public static function newAbout($request)
    {
        $photoUrl = $request->file('photo') ? self::getImageUrl($request->file('photo'), "upload/about-photos/") : '';
        $signatureUrl = $request->file('signature') ? self::getImageUrl($request->file('signature'), "upload/about-signatures/") : '';

        $about = new self();
        self::saveBasicInfo($about, $request, $photoUrl, $signatureUrl);
    }

    // Update an existing About entry
    public static function updateAbout($request, $id)
    {
        $about = self::findOrFail($id);

        if ($request->file('photo')) {
            if (file_exists($about->photo)) {
                unlink($about->photo);
            }
            $photoUrl = self::getImageUrl($request->file('photo'), "upload/about-photos/");
        } else {
            $photoUrl = $about->photo;
        }

        if ($request->file('signature')) {
            if (file_exists($about->signature)) {
                unlink($about->signature);
            }
            $signatureUrl = self::getImageUrl($request->file('signature'), "upload/about-signatures/");
        } else {
            $signatureUrl = $about->signature;
        }

        self::saveBasicInfo($about, $request, $photoUrl, $signatureUrl);
    }

    // Save or update basic info in the database
    private static function saveBasicInfo($about, $request, $photoUrl, $signatureUrl)
    {
        $about->title       = $request->title;
        $about->photo       = $photoUrl;
        $about->signature   = $signatureUrl;
        $about->description = $request->description;
        $about->save();
    }

    // Delete an About entry
    public static function deleteAbout($about)
    {
        if (file_exists($about->photo)) {
            unlink($about->photo);
        }
        if (file_exists($about->signature)) {
            unlink($about->signature);
        }

        $about->delete();
    }
}
