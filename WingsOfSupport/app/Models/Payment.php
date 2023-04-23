<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = "payments";
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
    public function provider()
    {
        return $this->belongsTo(ServiceProvider::class,'service_provider_id');
    }
}
