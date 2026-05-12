<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

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

        $product->name = 'Produk ' . rand(1, 100);
        $product->category_id = 1;
        $product->price = 10000;
        $product->stock = 10;
        $product->description = 'Produk dari insert';
        $product->status = 'tersedia';

        $product->save();

        return redirect('/products');
    }

    //    public function update($id)
    // {
    //     $product = Product::find($id);

    //     if ($product) {
    //         $product->status = 'Habis';
    //         $product->save();
    //     }

    //     return redirect('/products');
    // }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function destroy($id)
{
    $product = Product::findOrFail($id);

    $product->delete();

    return redirect()->route('products.index')
                     ->with('success', 'Data berhasil dihapus');
}

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store()
    {
        $product = new Product();
        $product->name = request('name');
        $product->price = request('price');
        $product->stock = request('stock');
        $product->category_id = request('category_id');
        $product->description = request('description');
        $product->status = request('status');
        $product->save();

        return redirect('/products')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        return redirect()->route('products.index');
    }
}
