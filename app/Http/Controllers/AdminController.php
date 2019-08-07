<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

	public function sessionCheck($req){
        if($req->session()->has('username')){
            return true;
        }else{
            return false;
        }
    }

    public function index(Request $req)
    {
    	if($this->sessionCheck($req)){
            return view('admin.index');
        }else{
    	return redirect()->route('login.index');
    }
    }
}
