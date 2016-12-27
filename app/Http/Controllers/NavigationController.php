<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Navigation;
use App\Http\Requests;
use DB;

class NavigationController extends Controller
{
    public function index() 
    {

    	$navigation = Navigation::orderBy('order', 'asc')
    							->get();

    	$order_low = Navigation::select('order')
								->orderBy('order', 'asc')
								->first();
		$order_high = Navigation::select('order')
								->orderBy('order', 'desc')
								->first();

    	return view('admin.navigation.index', compact('navigation', 'order_low', 'order_high'));

    }

    public function orderUp(Navigation $nav)
	{
		
		$order_now = $nav->order;
		$order_new = $nav->order - 1;

		DB::table('cbl_navigation')
			->where('order', $order_new)
			->update(['order' => $order_now]);

		$nav->order = $order_new;
		$nav->save();
		
		return back();

	}

	public function orderDown(Navigation $nav)
	{
		$order_now = $nav->order;
		$order_new = $nav->order + 1;

		DB::table('cbl_navigation')
			->where('order', $order_new)
			->update(['order' => $order_now]);

		$nav->order = $order_new;
		$nav->save();
		
		return back();
	}
}
