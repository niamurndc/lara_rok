<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        $setting = Setting::find(1);
        return view('admin.settings', ['set' => $setting]);
    }

    public function update(Request $req)
    {
        $setting = Setting::find(1);

        $setting->title = $req->title;
        $setting->slogan = $req->slogan;
        $setting->ship = $req->ship;

        $setting->save();
        return redirect('/admin/setting')->with('message', 'Setting Updated');
    }
}
