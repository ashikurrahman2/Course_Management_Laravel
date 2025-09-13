<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CourseDetail extends Model
{
    use HasFactory;

    private static $file, $fileName, $directory, $fileUrl;
    protected $table = 'course_details';

    protected $fillable = [
        'course_overview',
        'course_content',
        'course_subcontent',
        'course_teacherphoto',
        'course_teacherintro',
        'course_teacherdesignation',
        'pass_parcentage',
        'course_level',
    ];

    /**
     * Upload teacher photo
     */
    private static function getFileUrl($request)
    {
        self::$file = $request->file('course_teacherphoto');
        if (self::$file) {
            self::$fileName = time() . '_' . self::$file->getClientOriginalName();
            self::$directory = "upload/course-teachers/";
            self::$file->move(self::$directory, self::$fileName);

            $ext = strtolower(self::$file->getClientOriginalExtension());

            // Resize if image
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                $imageManager = new ImageManager(new Driver());
                $image = $imageManager->read(self::$directory . self::$fileName);
                $image->resize(400, 400); // Teacher photo fixed size
                $image->save(self::$directory . self::$fileName);
            }

            self::$fileUrl = self::$directory . self::$fileName;
            return self::$fileUrl;
        }
        return null;
    }

    /**
     * Create new CourseDetail
     */
    public static function newCourseDetail($request)
    {
        self::$fileUrl = $request->file('course_teacherphoto') ? self::getFileUrl($request) : '';
        $courseDetail = new self();
        self::saveBasicInfo($courseDetail, $request, self::$fileUrl);
    }

    /**
     * Update CourseDetail
     */
    public static function updateCourseDetail($request, $id)
    {
        $courseDetail = self::findOrFail($id);

        if ($request->file('course_teacherphoto')) {
            if (file_exists($courseDetail->course_teacherphoto)) {
                unlink($courseDetail->course_teacherphoto);
            }
            self::$fileUrl = self::getFileUrl($request);
        } else {
            self::$fileUrl = $courseDetail->course_teacherphoto;
        }

        self::saveBasicInfo($courseDetail, $request, self::$fileUrl);
    }

    /**
     * Save or update basic info
     */
    private static function saveBasicInfo($courseDetail, $request, $fileUrl)
    {
        $courseDetail->course_overview        = $request->course_overview;
        $courseDetail->course_content         = $request->course_content;
        $courseDetail->course_subcontent      = $request->course_subcontent;
        $courseDetail->course_teacherphoto    = $fileUrl;
        $courseDetail->course_teacherintro    = $request->course_teacherintro;
        $courseDetail->course_teacherdesignation = $request->course_teacherdesignation;
        $courseDetail->pass_parcentage        = $request->pass_parcentage;
        $courseDetail->course_level           = $request->course_level;
        $courseDetail->save();
    }

    /**
     * Delete CourseDetail
     */
    public static function deleteCourseDetail($courseDetail)
    {
        if (file_exists($courseDetail->course_teacherphoto)) {
            unlink($courseDetail->course_teacherphoto);
        }
        $courseDetail->delete();
    }
}
