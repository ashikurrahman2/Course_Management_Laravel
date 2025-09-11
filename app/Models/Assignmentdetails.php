<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Assignmentdetails extends Model
{
    use HasFactory;

    private static $file, $fileName, $directory, $fileUrl;

        protected $fillable = [
        'user_id', 
        'course_name', 
        'name',  
        'submission_date',
        'assignment_file',
    ];

      /**
     * Upload file (image or PDF)
     */
    private static function getFileUrl($request)
    {
        self::$file = $request->file('assignment_file');
        if (self::$file) {
            self::$fileName = time() . '_' . self::$file->getClientOriginalName();
            self::$directory = "upload/assignment-files/";
            self::$file->move(self::$directory, self::$fileName);

            $ext = strtolower(self::$file->getClientOriginalExtension());

            // If image to do resize
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                $imageManager = new ImageManager(new Driver());
                $image = $imageManager->read(self::$directory . self::$fileName);
                $image->resize(800, 600);
                $image->save(self::$directory . self::$fileName);
            }

            // Only move PDF file 
            self::$fileUrl = self::$directory . self::$fileName;
            return self::$fileUrl;
        }
        return null;
    }

        /**
     * Create new Assignment
     */
    public static function newAssignment($request)
    {
        self::$fileUrl = $request->file('assignment_file') ? self::getFileUrl($request) : '';
        $assignment = new self();
        self::saveBasicInfo($assignment, $request, self::$fileUrl);
    }

        /**
     * Save or update basic info
     */
    private static function saveBasicInfo($assignment, $request, $fileUrl)
    {
        $assignment->assignment_file   = $fileUrl;
        $assignment->name              = $request->name;
        $assignment->course_name          = $request->course_name;
        $assignment->user_id           = $request->user_id;
            // Convert submission_date into proper MySQL datetime format
        $assignment->submission_date = date('Y-m-d H:i:s', strtotime($request->submission_date));
        $assignment->save();
    }

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
