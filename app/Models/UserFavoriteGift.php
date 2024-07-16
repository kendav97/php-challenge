<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserFavoriteGift extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'gift_id',
        'alias',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
