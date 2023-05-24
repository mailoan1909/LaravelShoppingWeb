<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();


        return view('product.create', compact("categories"));
    }
    public function store(Request $request)
{
    if ($request->hasFile('imageProduct')) {
        $file = $request->file('imageProduct');
        $path = public_path('image/product');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move($path, $fileName);
    } else {
        $fileName = 'noname.jpg';
    }
    $newProduct = new Product();
            $newProduct->name = $request->name;
            $newProduct->price = $request->price;
            $newProduct->description = $request->description;
            $newProduct->image = $fileName;
            $newProduct->save();
            foreach ($request->CategoryIDs as $c) {
                $addC = Category::find($c);
                $newProduct->Category()->attach($c);
            }

            return redirect()->route('products.index');

}



}
