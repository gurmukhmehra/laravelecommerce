<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory','productCategory');
    }

    public function maintenanceAddon()
    {
        return $this->belongsTo('App\Models\MaintenanceAddon','maintenance_addon');
    }

}
