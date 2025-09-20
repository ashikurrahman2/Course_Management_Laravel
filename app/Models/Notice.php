<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notice extends Model
{
    use HasFactory;

    private static $notice;

    protected $fillable = [
        'notice_heading',
        'notice_date',
        'notice_details',
    ];

    /**
     * Create new Notice
     */
    public static function newNotice($request)
    {
        self::$notice = new self();
        self::saveBasicInfo(self::$notice, $request);
    }

    /**
     * Update Notice
     */
    public static function updateNotice($request, $id)
    {
        self::$notice = self::findOrFail($id);
        self::saveBasicInfo(self::$notice, $request);
    }

    /**
     * Save or update basic info
     */
    private static function saveBasicInfo($notice, $request)
    {
        $notice->notice_heading  = $request->notice_heading;
        $notice->notice_date     = $request->notice_date;   // YYYY-MM-DD ফরম্যাটে সেভ হবে
        $notice->notice_details  = $request->notice_details;
        $notice->save();
    }

    /**
     * Delete Notice
     */
    public static function deleteNotice($notice)
    {
        $notice->delete();
    }
}
