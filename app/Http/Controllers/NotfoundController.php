<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use DB;
use Auth;
use Illuminate\Http\Request;

class NotfoundController extends Controller
{


	public function pagenotfound()
	{
	
		return view('errors.custom');
	}
}
