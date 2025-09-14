<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admissionrequirement extends Model
{
    use HasFactory;

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'requirement_name',
    ];

    /**
     * Create a new Admission Requirement
     */
    public static function newRequirement($request)
    {
        $requirement = new self();
        self::saveBasicInfo($requirement, $request);
    }

    /**
     * Update an existing Admission Requirement
     */
    public static function updateRequirement($request, $id)
    {
        $requirement = self::findOrFail($id);
        self::saveBasicInfo($requirement, $request);
    }

    /**
     * Save or update basic info in the database
     */
    private static function saveBasicInfo($requirement, $request)
    {
        $requirement->requirement_name = $request->requirement_name;
        $requirement->save();
    }

    /**
     * Delete an Admission Requirement
     */
    public static function deleteRequirement($requirement)
    {
        $requirement->delete();
    }
}
