<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceAddon extends Model
{
    use HasFactory;
    public $timestamps = true; 
    
    public function ProductMaintenanceAddon()
    {
        return $this->hasMany('App\Models\Product','maintenance_addon');        
    }
}
