<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Sell extends Model
{
    use HasFactory;

       // Default value for status
       protected $attributes = [
        'status' => 'pending',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    private static $image, $imageName, $directory, $imageUrl;
    
    protected $fillable = [
        'title',
        'description',
        'address',
        'price',
        'zilla',
        'bds',
        'morrja',
        'qnty',
        'category',
        'road',
        'bayna',
        'image',
        'status',
        'user_id',
    ];

    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = "upload/sell/";

        // Move the uploaded image
        self::$image->move(self::$directory, self::$imageName);

        // Resize the image using Intervention Image
        $imageManager = new ImageManager(new Driver());

        // Reading the uploaded image
        $imageUrl = $imageManager->read(self::$directory . self::$imageName);

        // Resize the image
        $imageUrl->resize(600, 600); // Adjust size as needed
        $imageUrl->save(self::$directory . self::$imageName);

        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }

    // Create a new Sell record
    public static function newSell($request)
    {
        $request->merge(['user_id' => auth()->id()]);
        self::$imageUrl = $request->file('image') ? self::getImageUrl($request) : null;

        $sell = new Sell();
        self::saveBasicInfo($sell, $request, self::$imageUrl);  // Fix: Use self::$imageUrl here
    }

    private static function saveBasicInfo($sell, $request, $imageUrl)
    {
        $sell->title = $request->title;
        $sell->description = $request->description;
        $sell->address = $request->address;
        $sell->zilla = $request->zilla;
        $sell->bds = $request->bds;
        $sell->qnty = $request->qnty;
        $sell->morrja = $request->morrja;
        $sell->category = $request->category;
        $sell->road = $request->road;
        $sell->price = $request->price;
        $sell->bayna = $request->bayna;
        $sell->image = $imageUrl;
        $sell->user_id = $request->user_id;
        $sell->save();
    }
}
