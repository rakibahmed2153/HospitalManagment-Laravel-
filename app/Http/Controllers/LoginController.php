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
      
      if(count($result) > 0)
      {
        if($result[0]->type == 'admin')
        { 
  		//if(count($result) > 0){
			 $req->session()->put('id', $result[0]->id);
			$req->session()->put('username', $req->username);
			$req->session()->put('type', $result[0]->type);
			return redirect()->route('admin.index');
		}
			

	    else if( $result[0]->type == 'patient')
	    {
	    	if($result[0]->validation == 'valid')
	    	{
                //if(count($result) > 0){
				 $req->session()->put('id', $result[0]->id);
				$req->session()->put('username', $req->username);
				$req->session()->put('type', $result[0]->type);
				$req->session()->put('name', $result[0]->name);
				return redirect()->route('patient.index');
				}
				else
				{
				$req->session()->flash('msg', "Please Wait For Admin Validation");
				
				return redirect()->route('login.index');
		        }
	    }
	    	
	    

	    else if( $result[0]->type == 'doctor')
	    {
	    	if($result[0]->validation == 'valid')
	    	{
               // if(count($result) > 0){
				 $req->session()->put('id', $result[0]->id);
				$req->session()->put('username', $req->username);
				$req->session()->put('type', $result[0]->type);
				$req->session()->put('name', $result[0]->name);
				return redirect()->route('doctor.index');
			}
			else
				{
				$req->session()->flash('msg', "Please Wait For Admin Validation");
				
				return redirect()->route('login.index');
		        }
	    	
	    }

	    else if( $result[0]->type == 'nurse')
	    {
	    	if($result[0]->validation == 'valid')
	    	{
                //if(count($result) > 0){
				 $req->session()->put('id', $result[0]->id);
				$req->session()->put('username', $req->username);
				$req->session()->put('type', $result[0]->type);
				return redirect()->route('nurse.index');
				}
				
	    	else
	    	{
	    		$req->session()->flash('msg', "Please Wait For Admin Validation");
			
			      return redirect()->route('login.index');
	    	}
	    }
        }
	    else
	    {
	    	$req->session()->flash('msg', "Invalid User Name Or Password");
			
	    	return redirect()->route('login.index');
	    }

    }
}
