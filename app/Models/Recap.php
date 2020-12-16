<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recap extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'body'];

    public function getDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('l, d F Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeisTodayRecapNotAvailable(): bool
    {
        $recap = Recap::whereDate('created_at', Carbon::today()->toDateString())->first();
        return $recap==null;
    }
}
