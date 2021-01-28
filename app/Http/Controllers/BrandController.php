<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('editor');
    }

    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', ['brands' => $brands]);
    }

    public function create()
    {
        return view('admin.brand.add');
    }

    public function store(Request $req)
    {
        $brand = new Brand();

        $brand->title = $req->title;
        $brand->slug = Str::slug($req->title);

        $brand->save();
        return redirect('/admin/brands')->with('message', 'Created Successfuly');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', ['brand' => $brand]);
    }

    public function update(Request $req, $id)
    {
        $brand = Brand::find($id);
        $brand->title = $req->title;
        $brand->slug = Str::slug($req->title);

        $brand->update();
        return redirect('/admin/brands')->with('message', 'Updated Successfuly');
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        $products = Product::where('brand_id', $id)->get();
        foreach($products as $product){
            $product->delete();
        }
        $brand->delete();
        return redirect('/admin/brands')->with('message', 'Deleted Successfuly');
    }
}
