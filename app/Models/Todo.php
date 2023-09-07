<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;

    public $table = 'todos';

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::creating(function (Todo $todo) {
            $todo->id = Str::uuid()->toString();
        });
    }
}
