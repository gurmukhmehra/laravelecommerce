<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function posts()
    {
        return $this->hasMany(Post::class, 'categories', 'id');        
    }
}
