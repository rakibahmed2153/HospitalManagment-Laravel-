<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
    	return view('login.index');
    }

    public function valid(Request $req){

      $result	= DB::table('users')->where('username', $req->username)
				 ->where('password', $req->password)
				 ->get();


		if(count($result) > 0){
			$req->session()->put('username', $req->username);
			$req->session()->put('type', $result[0]->type);
			return redirect()->route('admin.index');
		}else{
			$req->session()->flash('msg', "invalid username or password!");
			
			return redirect()->route('login.index');
		}
    }
}
