<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    public $fillable =[
        'name',
        'image',
        'price',
        'qt',
        'content',
        'user_id'
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
}
