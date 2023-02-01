<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory;
    public $timestamps = true; 
    
    public function ProductByCategory()
    {
        return $this->hasMany('App\Models\Product','productCategory');        
    }
}
