<?php

namespace App\Http\Controllers;

use App\Models\Preorder;
use Illuminate\Http\Request;

class PreorderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        $preorders = Preorder::all();
        return view('admin.preorder', ['preorders' => $preorders]);
    }

    public function delete($id){
        $preorder = Preorder::find($id);
        $preorder->delete();

        return redirect('/admin/preorders')->with('message', 'Deleted Successfuly');
    }
}
