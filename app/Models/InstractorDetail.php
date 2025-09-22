<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InstractorDetail extends Model
{
    use HasFactory;

       protected $fillable = [
        'instructor_id',
        'about_me',
        'email',
        'phone',
        'address',
        'facebook',
        'linkedin',
        'twitter',
    ];

       // Create a new instructor details entry
    public static function newDetail($request)
    {
        $banner = new self();
        self::saveBasicInfo($banner, $request);
    }

       // Update an existing Banner entry
    public static function updateDetail($request, $id)
    {
        $banner = self::findOrFail($id);
        self::saveBasicInfo($banner, $request);
    }

      // Save or update basic info in the database
    private static function saveBasicInfo($banner, $request)
    {
        $banner->about_me          = $request->about_me;
        $banner->email             = $request->email;
        $banner->phone             = $request->phone;
        $banner->address           = $request->address;
        $banner->facebook          = $request->facebook;
        $banner->linkedin          = $request->linkedin;
        $banner->twitter           = $request->twitter;
        $banner->save();
    }

      // Delete a Banner entry
    public static function deleteDetail($banner)
    {
        $banner->delete();
    }

      public function instructor()
    {
        return $this->belongsTo(Instractor::class);
    }
}
