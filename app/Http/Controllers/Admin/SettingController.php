<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\setting;
use Flasher\Prime\FlasherInterface;
// use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $flasher;

    public function __construct(FlasherInterface $flasher)
    {
        $this->flasher = $flasher;
    }

    public function index()
    {
        $website = setting::first();
        return view('admin.setting.website', compact('website'));
    }

    public function update(Request $request, Setting $website,FlasherInterface $flasher)
    {
        // Use dd() to dump and die to see the request data
        // dd($request->all());
        Setting::updateSetting($request, $website);

        $this->flasher->addSuccess('Setting updated successfully!');
        return back();
    }
}

