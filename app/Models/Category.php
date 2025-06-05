<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    // Has factory class
       use HasFactory;

    // Fillable fields to allow mass assignment
       protected $fillable = [
         'category_name',];

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
          $category->category_name = $request->category_name;
          $category->save();
      }
    
        public static function deleteCategory($category)
        {
            $category->delete();
        }

    public function courses()
{
    return $this->hasMany(Course::class, 'cat_id'); // ✅ 'cat_id' foreign key
}



}
