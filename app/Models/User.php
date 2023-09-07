<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    public $table = 'users';

    protected $fillable = [
        'username',
        'email'
    ];

    protected static function booted()
    {
        static::creating(function (User $user) {
            $user->id = Str::uuid()->toString();
        });
    }
}
