<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
    	$data = Menu::find(1);
    	$menus = json_decode($data->data,true);
			return view('menu.index',compact('menus'));
    }

    public function builder()
    {
    	$data = Menu::find(1);
    	$menus = $data;
    	return view('menu.builder',compact('menus'));
    }

    public function update(Request $r)
    {
    	// return $r;
    	$data = Menu::find(1);
    	$data->data = $r->data;
    	$data->save();
    	return redirect()->back();

    }
}
