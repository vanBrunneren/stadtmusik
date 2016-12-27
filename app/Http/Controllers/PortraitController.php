<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portrait;
use App\Http\Requests;

class PortraitController extends Controller
{
    public function index() 
    {
    	$portrait = Portrait::orderBy('order', 'asc')
    							->get();

    	$order_low = Portrait::select('order')
								->orderBy('order', 'asc')
								->first();
		$order_high = Portrait::select('order')
								->orderBy('order', 'desc')
								->first();

    	return view('admin.portrait.index', compact('portrait', 'order_low', 'order_high'));
    }

    public function create() 
    {
    	return view('admin.portrait.create');
    }

    public function edit(Portrait $portrait)
    {
    	return view('admin.portrait.edit', compact('portrait'));
    }

    public function createSave(Request $request)
    {

        $portrait = new Portrait;

        if($request->file('input_image') && $request->file('input_image')->isValid()) {

            $destinationPath = public_path('images') . '/portrait/';
            $request->file('input_image')->move($destinationPath, $request->file('input_image')->getClientOriginalName());

            $portrait->imagepath = $destinationPath . $request->file('input_image')->getClientOriginalName();

        }

    	$portrait->title = $request->title;
    	$portrait->name = $request->name;
    	$portrait->shortDescription = $request->description;
    	$portrait->order = 1;
    	$portrait->save();

    	return redirect('/admin/portrait/edit/'.$portrait->id);
    }

    public function editSave(Portrait $portrait, Request $request) 
    {

        if($request->file('input_image') && $request->file('input_image')->isValid()) {

            $destinationPath = public_path('images') . '/portrait/';
            $request->file('input_image')->move($destinationPath, $request->file('input_image')->getClientOriginalName());

            $portrait->imagepath = $destinationPath . $request->file('input_image')->getClientOriginalName();

        }

    	$portrait->title = $request->title;
    	$portrait->name = $request->name;
    	$portrait->shortDescription = $request->description;
    	$portrait->order = $request->order;
    	$portrait->save();

    	return redirect('/admin/portrait/edit/'.$portrait->id);
    }

    public function delete(Portrait $portrait)
    {
        $portrait->delete();
        return redirect('/admin/portrait/index');
    }

}















