<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = "services";

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class,'service_category_id');
    }

    // public function provider()
    // {
    //     return $this->belongsTo(ServiceProvider::class,'service_provider_id');
    // }


    public function providers()
    {
        return $this->hasMany(ServiceProvider::class);
    }

    public function bookservices()
    {
        return $this->hasMany(BookService::class);
    }

}
