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
            'course_title', 'course_price', 'course_teacher',
            'course_lavel', 'course_duration', 'course_learn', 'course_content_title',
            'course_content_answer', 'course_content_requirement', 'category_name', 'course_audience','cat_id', 'course_image', 'category_id'
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

        $courses = new self();
        self::saveBasicInfo($courses, $request, self::$imageUrl);
    }

        // Update an existing About entry
        public static function updateCourse($request, $id)
        {
        // Fetch the team record using the ID
        $courses = self::findOrFail($id);

            if ($request->file('course_image')) {
                if (file_exists($courses->course_image)) {
                    unlink($courses->course_image);
                }
                self::$imageUrl = self::getImageUrl($request);
            } else {
                self::$imageUrl = $courses->course_image;
            }

            self::saveBasicInfo($courses, $request, self::$imageUrl);
            }

            // Save or update basic info in the database
        private static function saveBasicInfo($courses, $request, $imageUrl)
        {
            $courses->course_image                         = $imageUrl;
            $courses->category_name                                = $request->category_name;
            $courses->course_title                         = $request->course_title;
            $courses->course_price                         = $request->course_price;
            $courses->course_teacher                       = $request->course_teacher;
            $courses->course_lavel                         = $request->course_lavel;
            $courses->course_duration                      = $request->course_duration;
            $courses->course_learn                         = $request->course_learn;
            $courses->course_content_title                 = $request->course_content_title;
            $courses->course_content_answer                = $request->course_content_answer;
            $courses->course_content_requirement           = $request->course_content_requirement;
            $courses->course_audience                      = $request->course_audience;
            $courses->save();
        }

        // Delete an course entry
        public static function deleteCourse($courses)
        {
            if (file_exists($courses->course_image)) {
                unlink($courses->course_image);
            }
            
            $courses->delete();
        }

 public function category()
{
    return $this->belongsTo(Category::class, 'cat_id'); // ✅ belongsTo ঠিক আছে
}


}
