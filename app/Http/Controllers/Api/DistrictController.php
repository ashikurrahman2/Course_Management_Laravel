<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    // All divisions and them corresponding districts
    private $allDistricts = [
        "Dhaka" => ["Dhaka", "Gazipur", "Narsingdi", "Manikganj", "Munshiganj", "Tangail", "Faridpur", "Madaripur", "Gopalganj", "Shariatpur"],
        "Chattogram" => ["Chattogram", "Cox's Bazar", "Bandarban", "Rangamati", "Khagrachhari", "Noakhali", "Feni", "Brahmanbaria", "Cumilla", "Lakshmipur"],
        "Barishal" => ["Barishal", "Barguna", "Bhola", "Jhalokathi", "Patuakhali", "Pirojpur"],
        "Khulna" => ["Khulna", "Bagerhat", "Chuadanga", "Jashore", "Jhenaidah", "Kushtia", "Magura", "Meherpur", "Narail", "Satkhira"],
        "Mymensingh" => ["Mymensingh", "Jamalpur", "Netrokona", "Sherpur"],
        "Rajshahi" => ["Rajshahi", "Bogra", "Joypurhat", "Naogaon", "Natore", "Chapai Nawabganj", "Pabna", "Sirajganj"],
        "Rangpur" => ["Rangpur", "Dinajpur", "Kurigram", "Lalmonirhat", "Nilphamari", "Gaibandha", "Thakurgaon", "Panchagarh"],
        "Sylhet" => ["Sylhet", "Habiganj", "Moulvibazar", "Sunamganj"]
    ];

    // Fetch division
    public function divisions()
    {
        $divisions = array_keys($this->allDistricts);
        return response()->json(['divisions' => $divisions]);
    }

    // Unique Division according to do fetch Districts 
    public function districts($division)
    {
        $districts = $this->allDistricts[$division] ?? [];
        return response()->json(['districts' => $districts]);
    }
}
