<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function category()
    {
        return $this->belongsToMany(PostCategory::class, 'categories', 'id');
    }
}
