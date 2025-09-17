<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use Cart; // facade alias from config/app.php

class CartController extends Controller
{
    // Cart page
    public function index()
    {
        $categories = Category::all();
        $cartItems = Cart::content(); // get all cart items
        return view('frontend.pages.cart', compact('cartItems', 'categories'));
    }

    // Add to Cart
    public function store(Request $request, $id)
    {
        if(!auth()->check()){
            return redirect()->route('login')->with('error', 'You must login to add courses.');
        }

        $course = Course::findOrFail($id);

        // Validate price
        if(!is_numeric($course->price) || $course->price <= 0){
            return back()->with('error', 'Invalid course price!');
        }

        // Check if course already in cart
        $cartItem = Cart::search(function($cartItem, $rowId) use ($course) {
            return $cartItem->id === $course->id;
        })->first();

        if($cartItem){
            // If already in cart, increase qty
            Cart::update($cartItem->rowId, $cartItem->qty + 1);
        } else {
            // Else, add new item
            Cart::add([
                'id'      => $course->id,
                'name'    => $course->course_title,
                'qty'     => 1,
                'course_price'   => $course->course_price,
                'options' => [
                    'thumbnail' => $course->thumbnail ?? '',
                ],
            ]);
        }

        return redirect()->route('carts')->with('success', 'Course added to cart!');
    }

    // Remove item
    public function remove($rowId)
    {
        Cart::remove($rowId);
        return back()->with('success', 'Item removed from cart!');
    }
}
