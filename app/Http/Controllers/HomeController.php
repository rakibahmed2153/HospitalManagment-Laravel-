<?php

namespace App\Http\Controllers;
use App\Service;
use App\Department;
use App\User;
use App\Contact;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(){
     	
     	$dept = Department::all();
     	$services = Service::all();
    	return view('home.index', ['service' => $services, 'department' => $dept]);
       
    }
    public function appoint(){
        $dept = User::all()->where('type','doctor');
    	return view('home.Appoint',['depart' => $dept]);
    }

     public function create(Request $req){

    	$validation = Validator::make($req->all(), [

            'username'=>'required|unique:users',
            'password'=>'required|min:4',
            'name'=>'required',
            'number'=>'required|numeric',
            'email'=> 'required|regex:/^.+@.+$/i',
            'problem'=>'required',
            'address'=>'required',
            'confirmPassword'=>'required|same:password',
            'picture' => 'required',
        ])->validate();

        if($req->hasFile('picture')){
          
           $file = $req->file('picture');
           echo "<br>File Mime Type: ".$file->getMimeType();

        if($file->getMimeType() == 'image/jpeg'){
            //echo "File Name: ".$file->getClientOriginalName();
            //echo "<br>File Extension: ".$file->getClientOriginalExtension();
            //echo "<br>File Size: ".$file->getSize();
            //echo "<br>File Mime Type: ".$file->getMimeType();

            $user  = new User();
            $user->username = $req->username; 
            $user->password = $req->password;
            $user->validation = 'invalid';
            $user->type = 'patient';
            $user->name = $req->name;
            $user->doctorName = $req->doctorName;
            $user->number = $req->number;
            $user->email = $req->email;
            $user->problem = $req->problem;
            $user->address = $req->address;
             $file->move('upload/users', $req->username.'.jpeg');
            $user->save();
        
            $req->session()->flash('msg', "Appoint Request Successfully Send.
                                        Wait For Admin Approval");
            
            return redirect()->route('home.appoint');


           
        }
           else{
           $req->session()->flash('msg2', "Please Upload jpeg File");
            
            return redirect()->route('home.appoint');
           }
        }
       else{
           $req->session()->flash('msg2', "Picture Not Found");
            
         return redirect()->route('home.appoint');

        }
    }


       
    

    public function service(){

     	$services = Service::all();
    	return view('home.service', ['service' => $services]);	
    }

    public function about(){
        
        $user = User::all();
       // $doctor = Doctor::all();
    	return view('home.about',['User'=>$user]);
    	
    }

    public function contact(){
        
        return view('home.contact');
        
    }

    public function contactCreate(Request $req){
        $validation = Validator::make($req->all(), [

            'name'=>'required',
            'subject'=>'required',
            'email'=> 'required|regex:/^.+@.+$/i',
            'message'=>'required',
           
        ])->validate();

        $contact  = new Contact();
        $contact->name = $req->name; 
        $contact->email = $req->email;
        $contact->subject = $req->subject;
        $contact->message = $req->message;
        $contact->save();
        
        $req->session()->flash('msg', "Message Successfully Delivered");
            
            return redirect()->route('home.contact');
    }
}
