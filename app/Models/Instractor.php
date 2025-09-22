<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Instractor extends Model
{
    use HasFactory;

    private static $image, $imageName, $directory, $imageUrl;

    protected $fillable = [
        'instructor_name',
        'instructor_image',
        'instructor_designation',
    ];

    /**
     * Get image url after upload & resize
     */
    private static function getImageUrl($imageFile, $directory)
    {
        if ($imageFile) {
            self::$imageName = time() . '_' . $imageFile->getClientOriginalName();
            $path = $directory;
            $imageFile->move($path, self::$imageName);

            // Resize the image using Intervention Image
            $imageManager = new ImageManager(new Driver());
            $image = $imageManager->read($path . self::$imageName);
            $image->resize(600, 600); // Customize image size
            $image->save($path . self::$imageName);

            return $path . self::$imageName;
        }
        return null;
    }

    /**
     * Create new Instructor
     */
    public static function newInstractor($request)
    {
        $photoUrl = $request->file('instructor_image') 
            ? self::getImageUrl($request->file('instructor_image'), "upload/instructors/") 
            : '';

        $instractor = new self();
        self::saveBasicInfo($instractor, $request, $photoUrl);
    }

    /**
     * Update Instructor
     */
    public static function updateInstractor($request, $id)
    {
        $instractor = self::findOrFail($id);

        if ($request->file('instructor_image')) {
            if (file_exists($instractor->instructor_image)) {
                unlink($instractor->instructor_image);
            }
            $photoUrl = self::getImageUrl($request->file('instructor_image'), "upload/instructors/");
        } else {
            $photoUrl = $instractor->instructor_image;
        }

        self::saveBasicInfo($instractor, $request, $photoUrl);
    }

    /**
     * Save or update basic info
     */
    private static function saveBasicInfo($instractor, $request, $photoUrl)
    {
        $instractor->instructor_name        = $request->instructor_name;
        $instractor->instructor_image       = $photoUrl;
        $instractor->instructor_designation = $request->instructor_designation;
        $instractor->save();
    }

    /**
     * Delete Instructor
     */
    public static function deleteInstractor($instractor)
    {
        if (file_exists($instractor->instructor_image)) {
            unlink($instractor->instructor_image);
        }

        $instractor->delete();
    }

        public function details()
    {
          return $this->hasMany(InstractorDetail::class, 'instructor_id');
    }
}
