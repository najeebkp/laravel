<?php

namespace App\Http\Controllers;


use Auth;
use Illuminate\Http\Request;

class NotfoundController extends Controller
{


	public function pagenotfound()
	{
	
		return view('errors.custom');
	}
}
