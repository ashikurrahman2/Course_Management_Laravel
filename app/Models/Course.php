<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Course extends Model
{
    use HasFactory;

    private static $image, $imageName, $directory, $imageUrl;
        // Fillable fields to allow mass assignment
        protected $fillable = [
            'course_title',
            'course_category',
            'course_price',
            'course_teacher',
            'course_lavel',
            'course_duration',
            'course_learn',
            'course_content_title',
            'course_content_answer',
            'course_content_requirement',
            'course_audience',
            'course_image',
        ];
    // Function to upload and resize image
    private static function getImageUrl($request)
{
    self::$image = $request->file('course_image');
    if (self::$image) {
        self::$imageName = time() . '_' . self::$image->getClientOriginalName(); // Unique image name
        self::$directory = "upload/course-images/";
        self::$image->move(self::$directory, self::$imageName);

        // Resize the image using Intervention Image
        $imageManager = new ImageManager(new Driver());
        $image = $imageManager->read(self::$directory . self::$imageName);
        $image->resize(600, 600); // Resize to required dimensions
        $image->save(self::$directory . self::$imageName);

        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }
    return null;
   }

    // Create a new News entry
    public static function newCourse($request)
    {
        self::$imageUrl = $request->file('course_image') ? self::getImageUrl($request) : '';

        $course = new self();
        self::saveBasicInfo($course, $request, self::$imageUrl);
    }

        // Update an existing About entry
public static function updateCourse($request, $id)
{
 // Fetch the team record using the ID
 $course = self::findOrFail($id);

    if ($request->file('course_image')) {
        if (file_exists($course->course_image)) {
            unlink($course->course_image);
        }
        self::$imageUrl = self::getImageUrl($request);
    } else {
        self::$imageUrl = $course->course_image;
    }

    self::saveBasicInfo($course, $request, self::$imageUrl);
    }

    // Save or update basic info in the database
   private static function saveBasicInfo($course, $request, $imageUrl)
   {
       $course->course_image                         = $imageUrl;
       $course->course_title                         = $request->course_title;
       $course->course_category                      = $request->course_category;
       $course->course_price                         = $request->course_price;
       $course->course_teacher                       = $request->course_teacher;
       $course->course_lavel                         = $request->course_lavel;
       $course->course_duration                      = $request->course_duration;
       $course->course_learn                         = $request->course_learn;
       $course->course_content_title                 = $request->course_content_title;
       $course->course_content_answer                = $request->course_content_answer;
       $course->course_content_requirement           = $request->course_content_requirement;
       $course->course_audience                      = $request->course_audience;
       $course->save();
   }

   
        // Delete an Property entry
        public static function deleteCourse($course)
        {
            if (file_exists($course->course_image)) {
                unlink($course->course_image);
            }
            
            $course->delete();
        }
}
