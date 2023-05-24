<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    public $table ="category_product";

    public $primaryKey = ['id'];
    public $fillable = [
        'category_id', 'product_id',
    ];
    public function Category(){
        return $this -> belongsTo('app\Model\Category');
    }
    public function Product(){
        return $this -> belongsTo('app\Model\Product');
    }
}
