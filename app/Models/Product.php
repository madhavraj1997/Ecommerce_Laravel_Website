<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=[
        'cate_id',
        'name',
        'slug',
        'description',
        'old_price',
        'new_price',
        'image',
        'qty',
        'status',
        'trending',
        
    ];
    public function category(){
        return $this ->belongsTo(Category::class,'cate_id','id');
    }
}

