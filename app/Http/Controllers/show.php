<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class show extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	function show(){
		echo "welcome najeeb"; 
    //
	}
}