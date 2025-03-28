<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Land extends Model
{
    use HasFactory;

       // Fillable fields to allow mass assignment
       protected $fillable = [
        'land_category',];

        public static function newCategories($request)
        {
            $category = new self();
            self::saveBasicInfo($category, $request);
        }
    
      // Static method to handle category updates
      public static function updateCategories($request, $id)
      {
          // Find the category by ID
          $category = self::findOrFail($id);
  
          // Save the updated data
          self::saveBasicInfo($category, $request);
      }
  
      // Private method to save basic info
      private static function saveBasicInfo($category, $request)
      {
          $category->land_category = $request->land_category;
          $category->save();
      }
    
        public static function deleteCategory($category)
        {
            $category->delete();
        }
}
