<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;

    protected $table = "service_providers";
    protected $fillable = ['user_id'];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class,'service_category_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function bookservices()
    {
        return $this->hasMany(BookService::class);
    }

    // public function services()
    // {
    //     return $this->hasMany(Service::class);
    // }
}
