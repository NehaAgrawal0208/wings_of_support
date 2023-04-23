<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookService extends Model
{
    use HasFactory;

    protected $table = "book_services";
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
