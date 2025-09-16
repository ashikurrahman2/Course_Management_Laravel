<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
// use Anayarojo\Shoppingcart\ShoppingcartService;

class CartController extends Controller
{
    // protected $cart;

    // public function __construct(ShoppingcartService $cart)
    // {
    //     $this->cart = $cart;
    // }

    // // Show cart page
    public function index()
    {
       
  $categories = Category::all();
        return view('frontend.pages.cart', compact('categories'));
    }

    // // Add item to cart
    // public function add($id)
    // {
    //     $course = Course::findOrFail($id);

    //     $this->cart->add($course->id, $course->title, 1, $course->price, [
    //         'image' => $course->thumbnail ?? null
    //     ]);

    //     return redirect()->route('carts')->with('success', 'Course added to cart!');
    // }

    // // Remove item from cart
    // public function remove($id)
    // {
    //     $this->cart->remove($id);
    //     return redirect()->route('carts')->with('success', 'Item removed from cart!');
    // }
}
