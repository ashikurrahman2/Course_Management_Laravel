<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Sell;
use App\Models\About;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class SellController extends Controller
{
    protected $toastr;

    public function __construct(ToastrInterface $toastr)
    {
        $this->toastr = $toastr;
    }

    public function index()
    {
        return view('user.profile');
    }

// Store data in database
public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'zilla' => 'required|string|max:100',
            'bds' => 'nullable|string|max:100',
            'morrja' => 'nullable|string|max:100',
            'category' => 'required|string',
            'road' => 'nullable|string|max:100',
            'bayna' => 'nullable|string|max:100',
            'qnty' => 'nullable|integer|max:100',
            'price' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]); 
        Sell::newSell($request);
        $this->toastr->success('Sell form submitted successfully!!');
        return redirect()->route('cart.view');
    }

    // View cart code
    public function CartView()
{
    $sells = Sell::all();
    $abouts = About::all();
    return view('frontend.pages.cart_view', compact('sells', 'abouts'));
}

// Discount code
public function applyDiscount(Request $request)
{
    $validCode = 'DISCOUNT50'; 
    $discountAmount = 50; 

    if ($request->discount_code === $validCode) {
        session()->put('discount', $discountAmount);
        $this->toastr->success('ডিসকাউন্ট সফলভাবে প্রয়োগ হয়েছে!');
    } 
    
    else {
        $this->toastr->error('ডিসকাউন্ট কোড মিলে নাই। সঠিক কোড দিন।');
     }
  }

}
