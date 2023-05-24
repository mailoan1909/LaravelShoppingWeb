<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Category extends Model
{
    use HasFactory;
    public $table ="category";
    public $primaryKey = 'id';
    public $fillable = [
        'name', 'description',
    ];
    public $timestamps = false;
    public function category_product(){
        return $this ->hasMany('App\Models\CategoryProduct','category_id','id');
    }
}
