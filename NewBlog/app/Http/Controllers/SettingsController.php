<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){

        return view('Admin.settings.settings')->with('settings', Settings::first());
    }

    public function update(Request $request){


//        dd(request()->all());
//
        $this->validate($request,[

            'site_name'=>'required',

            'address'=>'required',
            'email'=>'required|email'


        ]);

        $settings = Settings::first();

        $settings->site_name = $request->site_name;
        $settings->email = $request->email;
        $settings->contact_number = $request->contact_namuber;
        $settings->address = $request->address;

        $settings->save();

        Session::flash('success','Settings Updated');

        return redirect()->back();
    }
}
