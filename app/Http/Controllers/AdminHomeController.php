<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use App\Http\Requests;

class AdminHomeController extends Controller
{
    public function index() 
    {

    	$home = Home::first();

    	return view('admin.home.index', compact('home'));

    }

    public function indexSave(Request $request) 
    {

    	$results = $request->all();

    	$home = Home::first();
        
        if(preg_match('/class="([a-zA-Z-]*)"/', $results['text'])) {
            $text = preg_replace('/class="([a-zA-Z-]*)"/', 'class="img-responsive"', $results['text']);
        } else {
            $text = str_replace("<img", "<img class='img-responsive'", $results['text']);
        }
        
    	$home->text = $text;
    	$home->save();

    	return back();

    }
}
