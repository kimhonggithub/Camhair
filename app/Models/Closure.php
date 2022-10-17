<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Closure extends Model
{
    use HasFactory;
    protected $table="closure_hair";
    protected $fillable = [
        'product_id'
    ];
    
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function wigcap(){
        return $this->belongTo(Wigcap::class,'wig_cap_id');
    }
    public function producing(){
        return $this->belongTo(Producing::class);
    }
    public function blend(){
        return $this->belongTo(Blend::class,'blend_id');
    }
    public function attribute(){
        return $this->belongTo(Attribute::class,'att_id');
    }
    
}
