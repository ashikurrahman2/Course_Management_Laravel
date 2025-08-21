<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class coursedetail extends Model
{
      use HasFactory;
    
      private static $image, $imageName, $directory, $imageUrl;

          // Fillable fields to allow mass assignment
        protected $fillable = [
            'course_overview', 'course_content', 'course_subcontent', 'course_teacherphoto', 'course_teacherintro',
            'course_teacherdesignation',
        ];

        // Function to upload and resize image
        private static function getImageUrl($request)
    {
        self::$image = $request->file('course_teacherphoto');
        if (self::$image) {
            self::$imageName = time() . '_' . self::$image->getClientOriginalName(); // Unique image name
            self::$directory = "upload/courseteacher-images/";
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

        // Create a new Course details entry
    public static function newCourseDetail($request)
    {
        self::$imageUrl = $request->file('course_teacherphoto') ? self::getImageUrl($request) : '';

        $courses_details = new self();
        self::saveBasicInfo($courses_details, $request, self::$imageUrl);
    }

           // Update an existing Course Details entry
        public static function updateCourseDetail($request, $id)
        {
        // Fetch the team record using the ID
        $courses_details = self::findOrFail($id);

            if ($request->file('course_teacherphoto')) {
                if (file_exists($courses_details->course_teacherphoto)) {
                    unlink($courses_details->course_teacherphoto);
                }
                self::$imageUrl = self::getImageUrl($request);
            } else {
                self::$imageUrl = $courses_details->course_teacherphoto;
            }

            self::saveBasicInfo($courses_details, $request, self::$imageUrl);
     }

               // Save or update basic info in the database
        private static function saveBasicInfo($courses_details, $request, $imageUrl)
        {
            $courses_details->course_teacherphoto                     = $imageUrl;
            $courses_details->course_overview                         = $request->course_overview;
            $courses_details->course_content                          = $request->course_content;
            $courses_details->course_subcontent                       = $request->course_subcontent;
            $courses_details->course_teacherintro                     = $request->course_teacherintro;
            $courses_details->course_teacherdesignation               = $request->course_teacherdesignation;
            $courses_details->save();
        }

              // Delete an course Details entry
        public static function deleteCourseDetail($courses_details)
        {
            if (file_exists($courses_details->course_teacherphoto)) {
                unlink($courses_details->course_teacherphoto);
            }
            
            $courses_details->delete();
        }
}
