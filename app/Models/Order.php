<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'order_id', 'course_name', 'order_date', 'price', 'status',
    ];

    private static $order;

    /**
     * Create a new order
     */
    public static function newOrder($request)
    {
        self::$order = new self();
        self::saveBasicInfo(self::$order, $request);
    }

    /**
     * Update an existing order
     */
    public static function updateOrder($request, $id)
    {
        self::$order = self::findOrFail($id);
        self::saveBasicInfo(self::$order, $request);
    }

    /**
     * Save or update basic info in the database
     */
    private static function saveBasicInfo($order, $request)
    {
        $order->user_id     = auth()->id();
        $order->order_id    = $request->order_id ?? ('#' . rand(1000, 9999));
        $order->course_name = $request->course_name;
        $order->order_date  = $request->order_date ?? now();
        $order->price       = $request->price;
        $order->status      = $request->status ?? 'Processing';

        $order->save();
    }

    /**
     * Delete an order
     */
    public static function deleteOrder($order)
    {
        $order->delete();
    }

    /**
     * Relation with User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
