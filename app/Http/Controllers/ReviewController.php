<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        $reviews = Review::all();
        return view('admin.review', ['reviews' => $reviews]);
    }

    public function update($id){
        $review = Review::find($id);

        if($review->status == 0){
            $review->status = 1;
        }else{
            $review->status = 0; 
        }

        $review->update();
        return redirect('/admin/reviews')->with('message', 'Updated Successfuly');
    }

    public function delete($id){
        $review = Review::find($id);
        $review->delete();

        return redirect('/admin/reviews')->with('message', 'Deleted Successfuly');
    }
}
