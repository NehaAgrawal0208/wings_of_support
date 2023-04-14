<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = "feedback";
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class,'service_category_id');
    }
}
