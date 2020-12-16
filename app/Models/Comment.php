<?php

namespace App\Models;

use App\Models\Recap;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'recap_id', 'text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recap()
    {
        return $this->belongsTo(Recap::class);
    }
}
