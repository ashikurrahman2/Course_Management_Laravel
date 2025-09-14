<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Admissionguide extends Model
{
    use HasFactory;

    private static $image, $imageName, $directory, $imageUrl;

    protected $fillable = [
        'guide_title', 'guide_content', 'guide_image', 'close_admission', 'session', 'closing_content',
    ];

    // Upload and resize image
    private static function getImageUrl($request)
    {
        self::$image = $request->file('guide_image');
        if (self::$image) {
            self::$imageName = time() . '_' . self::$image->getClientOriginalName();
            self::$directory = "upload/admission-images/";
            self::$image->move(self::$directory, self::$imageName);

            // Resize the image
            $imageManager = new ImageManager(new Driver());
            $image = $imageManager->read(self::$directory . self::$imageName);
            $image->resize(600, 600);
            $image->save(self::$directory . self::$imageName);

            self::$imageUrl = self::$directory . self::$imageName;
            return self::$imageUrl;
        }
        return null;
    }

    // Create a new Admission Guide
    public static function newGuide($request)
    {
        self::$imageUrl = $request->file('guide_image') ? self::getImageUrl($request) : '';

        $guide = new self();
        self::saveBasicInfo($guide, $request, self::$imageUrl);
    }

    // Update an existing Admission Guide
    public static function updateGuide($request, $id)
    {
        $guide = self::findOrFail($id);

        if ($request->file('guide_image')) {
            if (file_exists($guide->guide_image)) {
                unlink($guide->guide_image);
            }
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = $guide->guide_image;
        }

        self::saveBasicInfo($guide, $request, self::$imageUrl);
    }

    // Save or update basic info in the database
    private static function saveBasicInfo($guide, $request, $imageUrl)
    {
        $guide->guide_title       = $request->guide_title;
        $guide->guide_content     = $request->guide_content;
        $guide->guide_image       = $imageUrl;
        $guide->close_admission   = $request->close_admission;
        $guide->session           = $request->session;
        $guide->closing_content   = $request->closing_content;

        $guide->save();
    }

    // Delete an Admission Guide
    public static function deleteGuide($guide)
    {
        if (file_exists($guide->guide_image)) {
            unlink($guide->guide_image);
        }

        $guide->delete();
    }
}
