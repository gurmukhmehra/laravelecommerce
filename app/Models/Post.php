<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function categories()
    {
        return $this->belongsTo('App\Models\PostCategory','categories');
    }
}
