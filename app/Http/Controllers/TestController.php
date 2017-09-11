<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function showForm()
    {
        return view('tests.show_form');
    }

    public function postForm(Request $request)
    {
        dd($request->all());
    }


    public function combined(Request $request)
    {
        if($request->isMethod('post')){
            
            
            dd($request->all());
            
        }

        return view('tests.show_form');
    }
}
