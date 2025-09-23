<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'ques',
        'ans',
    ];

    // Create a new FAQ entry
    public static function newFaq($request)
    {
        $faq = new self();
        self::saveBasicInfo($faq, $request);
    }

    // Update an existing FAQ entry
    public static function updateFaq($request, $id)
    {
        $faq = self::findOrFail($id);
        self::saveBasicInfo($faq, $request);
    }

    // Save or update basic info in the database
    private static function saveBasicInfo($faq, $request)
    {
        $faq->ques   = $request->ques;
        $faq->ans    = $request->ans;
        $faq->save();
    }

    // Delete a FAQ entry
    public static function deleteFaq($faq)
    {
        $faq->delete();
    }
}
