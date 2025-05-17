<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory;

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'title',
        'sub_title',
    ];

    // Create a new Banner entry
    public static function newBanner($request)
    {
        $banner = new self();
        self::saveBasicInfo($banner, $request);
    }

    // Update an existing Banner entry
    public static function updateBanner($request, $id)
    {
        $banner = self::findOrFail($id);
        self::saveBasicInfo($banner, $request);
    }

    // Save or update basic info in the database
    private static function saveBasicInfo($banner, $request)
    {
        $banner->title          = $request->title;
        $banner->sub_title      = $request->sub_title;
        $banner->save();
    }

    // Delete a Banner entry
    public static function deleteBanner($banner)
    {
        $banner->delete();
    }
}
