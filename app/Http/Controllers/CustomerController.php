<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        $users = User::all();
        return view('admin.customer.index', ['customers' => $users]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.customer.view', ['user' => $user]);
    }

    public function update(Request $req, $id)
    {
        $user = User::find($id);

        $user->name = $req->name;
        $user->password = $req->password == null ? $user->password : Hash::make($req->password);
        $user->role = $req->role == null ? $user->role : $req->role;

        $user->update();
        return redirect('/admin/customers')->with('message', 'Updated Successfuly');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/customers')->with('message', 'Deleted Successfuly');
    }
}
