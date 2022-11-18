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
    public function lenghts()
    {
        return $this->belongsTo(Lenght::class,'lenghts_id');
    }
    public function wigcaps()
    {
        return $this->belongsTo(Wigcap::class,'wigcaps_id');
    }
    public function sizevalue(){
        return $this->belongsTo(Sizevalue::class,'sizevalue_id');
    }
    protected $casts = [
        //
    ];
    public static function search($query,$cat_id){
    return empty($query) ? static::query()->where('category_id', $cat_id)
        : static::where('category_id', $cat_id)
            ->where(function($q) use ($query) {
                $q
                    ->where('name', 'LIKE', '%'. $query . '%')
                    ->orWhere('Luster', 'LIKE ', '%' . $query . '%');
            });
}
}
