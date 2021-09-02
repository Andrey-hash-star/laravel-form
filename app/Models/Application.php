<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tel',
        'company',
        'application',
        'message',
        'file',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function uploadFile(Request $request)
    {
        if ($request->hasFile('file')) {
            $folder = date('Y-m-d');
            return $request->file('file')->store("file/{$folder}");
        }
        return null;
    }

    public function getApplicationDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-m-Y H:i:s');
    }

}
