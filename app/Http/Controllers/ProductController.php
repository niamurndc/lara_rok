<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('editor');
    }

    public function index()
    {
        
        $products = Product::all();
        return view('admin.product.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        $brands = Brand::all();
        return view('admin.product.add', ['categories' => $categories, 'authors' => $authors, 'brands' => $brands]);
    }

    public function store(Request $req)
    {
        $product = new Product();

        $product->title = $req->title;
        $product->desc = $req->desc;
        $product->price = $req->price;
        $product->stock = $req->stock;
        $product->best = $req->best;
        $product->category_id = $req->category_id;
        $product->author_id = $req->author_id;
        $product->brand_id = $req->brand_id;
        $product->slug = Str::slug($req->title);

        // add image
        $image = $req->file('image');
        $ext = $image->getClientOriginalExtension();
        $cover = 'pro-'.time().'.'.$ext;
        $product->image = $cover;
        $path = 'image/product';
        $image->move($path, $cover);

        $product->save();
        return redirect('/admin/products')->with('message', 'Created Successfuly');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $authors = Author::all();
        $brands = Brand::all();
        $product = Product::find($id);
        return view('admin.product.edit', ['product' => $product, 'categories' => $categories, 'authors' => $authors, 'brands' => $brands]);
    }

    public function update(Request $req, $id)
    {
        $product = Product::find($id);
        
        $product->title = $req->title;
        $product->desc = $req->desc;
        $product->price = $req->price;
        $product->stock = $req->stock;
        $product->best = $req->best;
        $product->category_id = $req->category_id;
        $product->author_id = $req->author_id;
        $product->brand_id = $req->brand_id;
        $product->slug = Str::slug($req->title);

        // add image
        $image = $req->file('image');
        if($image != null){
            $ext = $image->getClientOriginalExtension();
            $cover = 'pro-'.time().'.'.$ext;
            $product->image = $cover;
            $path = 'image/product';
            $image->move($path, $cover);
        }

        $product->update();
        return redirect('/admin/products')->with('message', 'Updated Successfuly');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/products')->with('message', 'Deleted Successfuly');
    }
}
