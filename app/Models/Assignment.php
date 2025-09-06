<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Assignment extends Model
{
    use HasFactory;

    private static $file, $fileName, $directory, $fileUrl;

    protected $fillable = [
        'course_name', 
        'exp_name', 
        'total_marks', 
        'deadline', 
        'assigned_date',
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
     * Update Assignment
     */
    public static function updateAssignment($request, $id)
    {
        $assignment = self::findOrFail($id);

        if ($request->file('assignment_file')) {
            if (file_exists($assignment->assignment_file)) {
                unlink($assignment->assignment_file);
            }
            self::$fileUrl = self::getFileUrl($request);
        } else {
            self::$fileUrl = $assignment->assignment_file;
        }

        self::saveBasicInfo($assignment, $request, self::$fileUrl);
    }

    /**
     * Save or update basic info
     */
    private static function saveBasicInfo($assignment, $request, $fileUrl)
    {
        $assignment->assignment_file   = $fileUrl;
        $assignment->course_name       = $request->course_name;
        $assignment->exp_name          = $request->exp_name;
        $assignment->total_marks       = $request->total_marks;
        $assignment->deadline          = $request->deadline;
        $assignment->assigned_date     = $request->assigned_date;
        $assignment->save();
    }

    /**
     * Delete Assignment
     */
    public static function deleteAssignment($assignment)
    {
        if (file_exists($assignment->assignment_file)) {
            unlink($assignment->assignment_file);
        }
        $assignment->delete();
    }
   
}
