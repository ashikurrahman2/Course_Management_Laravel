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
        $detail = new self();
        self::saveBasicInfo($detail, $request);
    }

    // Update an existing instructor detail
    public static function updateDetail($request, $id)
    {
        $detail = self::findOrFail($id);
        self::saveBasicInfo($detail, $request);
    }

    // Save or update basic info in the database
    private static function saveBasicInfo($detail, $request)
    {
        $detail->instructor_id     = $request->instructor_id; // ✅ Must assign
        $detail->about_me          = $request->about_me;
        $detail->email             = $request->email;
        $detail->phone             = $request->phone;
        $detail->address           = $request->address;
        $detail->facebook          = $request->facebook;
        $detail->linkedin          = $request->linkedin;
        $detail->twitter           = $request->twitter;
        $detail->save();
    }

    // Delete a detail entry
    public static function deleteDetail($detail)
    {
        $detail->delete();
    }

    // Relationship to instructor
    public function instructor()
    {
        
        return $this->belongsTo(Instractor::class, 'instructor_id');
    }
}
