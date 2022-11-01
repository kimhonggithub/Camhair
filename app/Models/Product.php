<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    
    public function colors(){
        return $this->belongsTo(Colors::class,'color_id');
    }
    public function patterns()
    {
        return $this->belongsTo(Patterns::class,'pattern_id');
    }
}
