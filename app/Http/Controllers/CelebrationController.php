<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Celebration;
use App\Http\Requests;

class CelebrationController extends Controller
{
    public function index() 
    {

    	$celebration = Celebration::first();

    	return view('admin.celebration.index', compact('celebration'));

    }

    public function indexSave(Request $request) 
    {

    	$results = $request->all();

    	$celebration = Celebration::first();
    	
        if(preg_match('/class="([a-zA-Z-]*)"/', $results['text'])) {
            $text = preg_replace('/class="([a-zA-Z-]*)"/', 'class="img-responsive"', $results['text']);
        } else {
            $text = str_replace("<img", "<img class='img-responsive'", $results['text']);
        }
        
        $celebration->text = $text;
    	$celebration->save();

    	return back();

    }
}
