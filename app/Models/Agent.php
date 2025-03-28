<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Agent extends Model
{
    use HasFactory;

    private static $image, $imageName, $directory, $imageUrl;
        // Fillable fields to allow mass assignment
        protected $fillable = [
            'agent_image',
            'agent_name',
            'agent_designation',
            'agent_face',
            'agent_linked',
        ];
    // Function to upload and resize image
    private static function getImageUrl($request)
{
    self::$image = $request->file('agent_image');
    if (self::$image) {
        self::$imageName = time() . '_' . self::$image->getClientOriginalName(); // Unique image name
        self::$directory = "upload/agent-images/";
        self::$image->move(self::$directory, self::$imageName);

        // Resize the image using Intervention Image
        $imageManager = new ImageManager(new Driver());
        $image = $imageManager->read(self::$directory . self::$imageName);
        $image->resize(1200, 600); // Resize to required dimensions
        $image->save(self::$directory . self::$imageName);

        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }
    return null;
   }

    // Create a new News entry
    public static function newAgent($request)
    {
        self::$imageUrl = $request->file('agent_image') ? self::getImageUrl($request) : '';

        $agent = new self();
        self::saveBasicInfo($agent, $request, self::$imageUrl);
    }

        // Update an existing About entry
public static function updateAgent($request, $id)
{
 // Fetch the team record using the ID
 $agent = self::findOrFail($id);

    if ($request->file('agent_image')) {
        if (file_exists($agent->agent_image)) {
            unlink($agent->agent_image);
        }
        self::$imageUrl = self::getImageUrl($request);
    } else {
        self::$imageUrl = $agent->agent_image;
    }

    self::saveBasicInfo($agent, $request, self::$imageUrl);
    }

    // Save or update basic info in the database
   private static function saveBasicInfo($agent, $request, $imageUrl)
   {
       $agent->agent_image          = $imageUrl;
       $agent->agent_name           = $request->agent_name;
       $agent->agent_designation    = $request->agent_designation;
       $agent->agent_face           = $request->agent_face;
       $agent->agent_linked         = $request->agent_linked;
       $agent->save();
   }

   
// Delete an Property entry
public static function deleteAgent($agent)
{
    if (file_exists($agent->agent_image)) {
        unlink($agent->agent_image);
    }
    
    $agent->delete();
    }
}
