<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function ajaxRequest()

    {

        return view('ajaxRequest');

    }

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function ajaxRequestPost()

    {

        $input = request()->all();

        return response()->json(['success'=>'Got Simple Ajax Request.']);

    }
}
