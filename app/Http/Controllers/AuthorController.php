<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $authors = Author::all();
        return view('admin.author.index', ['authors' => $authors]);
    }

    public function create()
    {
        return view('admin.author.add');
    }

    public function store(Request $req)
    {
        $author = new Author();

        $author->title = $req->title;
        $author->bio = $req->bio;
        $author->slug = Str::slug($req->title);

        // add image
        $image = $req->file('image');
        $ext = $image->getClientOriginalExtension();
        $cover = 'author-'.time().'.'.$ext;
        $author->image = $cover;
        $path = 'image/author';
        $image->move($path, $cover);

        $author->save();
        return redirect('/admin/authors')->with('message', 'Created Successfuly');
    }

    public function edit($id)
    {
        $author = Author::find($id);
        return view('admin.author.edit', ['author' => $author]);
    }

    public function update(Request $req, $id)
    {
        $author = Author::find($id);
        
        $author->title = $req->title;
        $author->bio = $req->bio;
        $author->slug = Str::slug($req->title);

        // add image
        $image = $req->file('image');
        If($image != null){
            $ext = $image->getClientOriginalExtension();
            $cover = 'author-'.time().'.'.$ext;
            $author->image = $cover;
            $path = 'image/author';
            $image->move($path, $cover);
        }

        $author->update();
        return redirect('/admin/authors')->with('message', 'Updated Successfuly');
    }

    public function delete($id)
    {
        $author = Author::find($id);
        $products = Product::where('author_id', $id)->get();
        foreach($products as $product){
            $product->delete();
        }
        $author->delete();
        return redirect('/admin/authors')->with('message', 'Deleted Successfuly');
    }
}
