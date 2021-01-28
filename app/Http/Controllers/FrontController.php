<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Preorder;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Auth;

class FrontController extends Controller
{
    public function index()
    {
        $best = Product::where('best', 'on')->get();
        $authors = Author::all();
        return view('welcome', ['best_seller' => $best, 'authors' => $authors]);
    }

    public function electronics()
    {
        $best = Product::where('best', 'on')->get();
        $category = Category::where('section', 'book')->get();
        $brands = Brand::all();
        return view('electron', ['best_seller' => $best, 'category' => $category, 'brands' => $brands]);
    }

    public function products()
    {
        $best = Product::where('best', 'on')->get();
        $category = Category::where('section', 'book')->get();
        $brands = Brand::all();
        return view('products', ['best_seller' => $best, 'category' => $category, 'brands' => $brands]);
    }

    public function authorAll()
    {
        $authors = Author::all();
        return view('author', ['authors' => $authors]);
    }

    public function blog()
    {
        $blogs = Blog::all();
        return view('blog', ['blogs' => $blogs]);
    }

    public function search()
    {
        $key = $_GET['search'];
        $result = Product::where('title', 'LIKE', '%'.$key.'%')->get();
        return view('search', ['result' => $result]);
    }

    public function addcart($id)
    {
        session_start();
        $cart = new Cart();

        $cart->product_id = $id;
        $cart->quantity = 1;
        $cart->status = 0;
        $cart->session_id = session_id();

        $cart->save();
        return redirect()->back();
    }

    public function cart()
    {
        session_start();
        $sid = session_id();
        $carts = Cart::where('session_id', $sid)->where('status', '0')->get();
        return view('cart', ['carts' => $carts]);
    }

    public function editcart($id)
    {
        $quantity = $_GET['quantity'];

        $cart = Cart::find($id);

        $cart->quantity = $quantity;
        $cart->update();
        return redirect('/cart');
    }

    public function deletecart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect('/cart');
    }

    // some view function

    public function viewcat($id)
    {
        $cat = Category::find($id);
        $category = Category::where('section', $cat->section)->get();
        $books = Product::where('category_id', $id)->get();
        $brands = Brand::all();
        $authors = Author::all();
        return view('view.category', ['category' => $cat, 'categories' => $category, 'books' => $books, 'brands' => $brands, 'authors' => $authors]);
    }

    public function viewbrand($id)
    {
        $brand = Brand::find($id);
        $category = Category::all();
        $books = Product::where('brand_id', $id)->get();
        $brands = Brand::all();
        return view('view.brand', ['brand' => $brand, 'categories' => $category, 'books' => $books, 'brands' => $brands]);
    }

    public function viewauth($id)
    {
        $author = Author::find($id);
        $authors = Author::all();
        $category = Category::where('section', 'book')->get();
        $books = Product::where('author_id', $id)->get();
        return view('view.author', ['author' => $author, 'categories' => $category, 'books' => $books, 'authors' => $authors]);
    }

    public function viewpro($id)
    {
        $product = Product::find($id);
        $books = Product::where('author_id', $product->author_id)->get();
        $ratings = Review::where('product_id', $id)->where('status', '1')->get();

        return view('view.product', [ 'product' => $product, 'books' => $books, 'ratings' => $ratings]);
    }

    public function viewblog($id)
    {
        $blog = Blog::find($id);
        $blogs = Blog::where('category_id', $blog->category_id)->get();
        return view('view.blog', ['blog' => $blog, 'blogs' => $blogs]);
    }

    public function preorder($id){
        $pre = new Preorder();

        $pre->name = Auth::user()->name;
        $pre->email = Auth::user()->email;
        $pre->product_id = $id;

        $pre->save();
        return redirect()->back();
    }

}
