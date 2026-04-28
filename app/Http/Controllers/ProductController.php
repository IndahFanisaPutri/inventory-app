<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function insert()
{
    $product = new Product();

    $product->name = 'Produk '. rand(1, 100);
    $product->category_id = 1;
    $product->price = 10000;
    $product->stock = 10;
    $product->description = 'Produk dari insert';
    $product->status = 'tersedia';

    $product->save();

    return redirect('/products');
}

    public function update($id)
{
    $product = Product::find($id);

    if ($product) {
        $product->name = 'Produk Update ' . rand(1,100);
        $product->price = 20000;
        $product->status = 'habis';
        $product->save();
    }

    return redirect('/products');
}
    
    public function delete($id)
{
    $product = Product::find($id);

    if ($product) {
        $product->delete();
    }

    return redirect('/products');
}
}
