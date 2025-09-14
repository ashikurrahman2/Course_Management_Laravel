<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    public function Data()
    {
        $districts = [
            "Bagerhat", "Bandarban", "Barguna", "Barishal", "Bhola", "Bogra", 
            "Brahmanbaria", "Chandpur", "Chattogram", "Cumilla", "Cox's Bazar", 
            "Dhaka", "Dinajpur", "Faridpur", "Feni", "Gaibandha", "Gazipur", 
            "Gopalganj", "Habiganj", "Jamalpur", "Jashore", "Jhalokati", 
            "Jhenaidah", "Joypurhat", "Khagrachari", "Khulna", "Kishoreganj", 
            "Kurigram", "Kushtia", "Lakshmipur", "Lalmonirhat", "Madaripur", 
            "Magura", "Manikganj", "Meherpur", "Moulvibazar", "Munshiganj", 
            "Mymensingh", "Naogaon", "Narail", "Narayanganj", "Narsingdi", 
            "Natore", "Netrokona", "Nilphamari", "Noakhali", "Pabna", 
            "Panchagarh", "Patuakhali", "Pirojpur", "Rajbari", "Rajshahi", 
            "Rangamati", "Rangpur", "Satkhira", "Shariatpur", "Sherpur", 
            "Sirajganj", "Sunamganj", "Sylhet", "Tangail", "Thakurgaon"
        ];

        return response()->json(['districts' => $districts]);
    }
}
