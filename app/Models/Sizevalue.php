<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sizevalue extends Model
{
    use HasFactory;
    protected $table = "sizevalue";
   
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
