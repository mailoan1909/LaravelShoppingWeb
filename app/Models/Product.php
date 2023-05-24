<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
    use HasFactory;
    public $table ="product";
    public $primaryKey = 'id';
    public $fillable = [
        'name', 'description','price','image','category_id'
    ];
    public $timestamps = false;
    public function category_product(){
        return $this ->hasMany('App\Models\CategoryProduct','product_id','id');
    }
}
