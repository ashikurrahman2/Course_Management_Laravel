<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Notifications\AdminNotification;

class AdminNotificationController extends Controller
{
        public function markAllRead()
    {
        auth()->guard('admin')->user()->unreadNotifications->markAsRead();
        return back();

        // এক বা একাধিক admin কে পাঠাতে পারেন
$admin = Admin::first(); // অথবা where(...)->get()
$admin->notify(new AdminNotification('New User Signup', 'A new user has registered.'));
    }
}
