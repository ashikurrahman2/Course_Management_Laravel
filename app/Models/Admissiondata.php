<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Admissiondata extends Model
{
    use HasFactory;
   // Table name (optional, যদি plural form না হয়)
    protected $table = 'admissiondatas';
    protected $fillable = [
        'stu_name',
        'stu_email',
        'stu_phone',
        'stu_gender',
        'stu_course',
        'stu_address',
        'stu_division',
        'stu_distict',
        'stu_photo',
    ];

    private static $imageName, $directory;

    // ✅ Function for storing new Admission data
    public static function newAdmission($request)
    {
        $photoUrl = $request->file('stu_photo') ? self::getImageUrl($request->file('stu_photo'), "upload/admission/") : null;

        $admission = new self();
        $admission->stu_name     = $request->stu_name;
        $admission->stu_email    = $request->stu_email;
        $admission->stu_phone    = $request->stu_phone;
        $admission->stu_gender   = $request->stu_gender;
        $admission->stu_course   = $request->stu_course;
        $admission->stu_address  = $request->stu_address;
        $admission->stu_division = $request->stu_division;
        $admission->stu_distict  = $request->stu_distict;
        $admission->stu_photo    = $photoUrl;
        $admission->save();
    }

    // ✅ Image Upload & Resize
    private static function getImageUrl($imageFile, $directory)
    {
        self::$imageName = time() . '_' . $imageFile->getClientOriginalName();
        $imageFile->move($directory, self::$imageName);

        $imageManager = new ImageManager(new Driver());
        $image = $imageManager->read($directory . self::$imageName);
        $image->resize(600, 600); // square resize
        $image->save($directory . self::$imageName);

        return $directory . self::$imageName;
    }
}
