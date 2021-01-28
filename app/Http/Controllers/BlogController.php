<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        
        $blogs = Blog::all();
        return view('admin.blog.index', ['blogs' => $blogs]);
    }

    public function create()
    {
        $categories = Category::where('section', 'blog')->get();
        return view('admin.blog.add', ['categories' => $categories]);
    }

    public function store(Request $req)
    {
        $blog = new Blog();

        $blog->title = $req->title;
        $blog->body = $req->body;
        $blog->category_id = $req->category_id;
        $blog->slug = Str::slug($req->title);

        // add image
        $image = $req->file('cover');
        $ext = $image->getClientOriginalExtension();
        $cover = 'blog-'.time().'.'.$ext;
        $blog->cover = $cover;
        $path = 'image/blog';
        $image->move($path, $cover);

        $blog->save();
        return redirect('/admin/blogs')->with('message', 'Created Successfuly');
    }

    public function edit($id)
    {
        $categories = Category::where('section', 'blog')->get();
        $blog = Blog::find($id);
        return view('admin.blog.edit', ['blog' => $blog, 'categories' => $categories]);
    }

    public function update(Request $req, $id)
    {
        $blog = Blog::find($id);
        
        $blog->title = $req->title;
        $blog->body = $req->body;
        $blog->category_id = $req->category_id;
        $blog->slug = Str::slug($req->title);

        // add image
        $image = $req->file('cover');
        if($image != null){
            $ext = $image->getClientOriginalExtension();
            $cover = 'blog-'.time().'.'.$ext;
            $blog->cover = $cover;
            $path = 'image/blog';
            $image->move($path, $cover);
        }

        $blog->update();
        return redirect('/admin/blogs')->with('message', 'Updated Successfuly');
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('/admin/blogs')->with('message', 'Deleted Successfuly');
    }
}
