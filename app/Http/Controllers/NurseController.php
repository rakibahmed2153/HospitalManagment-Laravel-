<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use App\Contact;
use App\Notice;
use App\Service;
use App\Blood;
use App\Bed;
use App\Prescription;
use App\Report;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NurseController extends Controller
{
     public function index(Request $req)
    {

            $uname = $req->session()->get('username');

            $patient = User::all()->where('type','patient');
            $totalPact = $patient->count();
            
            $bed = Bed::all();
            $totalBed = $bed->count();
            
            $blood = Blood::all();
            $totalblood = $blood->count();
            
            $prescrip = Prescription::all();
            $totalPres = $prescrip->count();
            
            $report = Report::all();
            $totalRep = $report->count();
           
            
            $appoint = User::all()->where('type', 'patient')
                                  ->where('validation','invalid');
            $totalSer = $appoint->count();

            $notice = Notice::all();
            $totalnote = $notice->count();
            
            return view('nurse.index',['pat' => $totalPact, 'bed' => $totalBed, 'blood' => $totalblood, 'pres' => $totalPres, 'ser' => $totalSer, 'note' => $totalnote, 'report' => $totalRep]);
       
    
    }


    //Start Patient Part   

    public function addpatient(Request $req)
    {
    	$user = User::all()->where('type','doctor');
    	return view('nurse.addPatient', ['User' => $user]);
    }

     public function patientCreate(Request  $req)
    {
    	$validation = Validator::make($req->all(), [

            'username'=>'required|unique:users',
            'password'=>'required|min:4',
            'name'=>'required',
            'number'=>'required|numeric',
            'email'=> 'required|regex:/^.+@.+$/i',
            'address'=>'required',
            'confirmPassword'=>'required|same:password',
            'picture' => 'required',
        ])->validate();

        if($req->hasFile('picture')){
          
           $file = $req->file('picture');
           echo "<br>File Mime Type: ".$file->getMimeType();

        if($file->getMimeType() == 'image/jpeg'){
           
            $user  = new User();
            $user->username = $req->username; 
            $user->password = $req->password;
            $user->validation = 'valid';
            $user->type = 'patient';
            $user->name = $req->name;
            $user->doctorName = $req->doctorName;
            $user->number = $req->number;
            $user->email = $req->email;
            $user->address = $req->address;
            $user->problem = $req->problem;
             $file->move('upload/users', $req->username.'.jpeg');
            $user->save();
        
            $req->session()->flash('msg', "Patient Is Successfully Added");
            
            return redirect()->route('nurse.addpatient');


           
        }
           else{
           $req->session()->flash('msg2', "Please Upload jpeg File");
            
            return redirect()->route('nurse.addpatient');
           }
        }
       else{
           $req->session()->flash('msg2', "Picture Not Found");
            
         return redirect()->route('nurse.addpatient');

        }
    }

    public function patientlist(Request $req)
    {
       $patient = User::all()->where('type','patient')->where('validation','valid');;
	   return view('nurse.PatientList', ['patient' => $patient]);
    }

	public function editpact($sid)
    {
    	       $doctor = User::all()->where('type','doctor');
    	       $user = User::Find($sid);
	            return view('nurse.editPatient', ['user' => $user, 'doctor' => $doctor]);
    }

	public function editPatient(Request $req, $sid)
	{
	
	  $validation = Validator::make($req->all(), [

            'name'=>'required',
            'email'=>'required',
            'number'=>'required',
            'address'=>'required',
            'doctorName'=>'required',
            'problem'=>'required'

        ])->validate();

	            $user = User::find($sid);
	            $user->name = $req->name; 
	            $user->number = $req->number;
	            $user->email = $req->email;
	            $user->address = $req->address;
	            $user->doctorName = $req->doctorName;
	            $user->problem = $req->problem;
	            $user->save();
	            
		        return redirect()->route('nurse.patientlist');

    }


     public function deletepatient($sid)
     {
    	
    	$s = User::find($sid);
    	return view('nurse.deletePatient', ['d'=> $s]);
    	
    }


    public function destroypatient($sid)
    {
       
        User::destroy($sid);
        return redirect()->route('nurse.patientlist');
      
    }
    //Patient Part End

    //Notice Part Start
    public function noticelist(Request $req)
    {
    	$notice = Notice::all();
    	return view('nurse.NoticeList', compact('notice'));
    }
    
    //Notice Part Ends

     //Blood Part Start
    public function bloodlist(Request $req)
    {
    	$blood = Blood::all();
    	return view('nurse.BloodList', compact('blood'));
    }


    public function addblood()
    {
    	return view('nurse.addBlood');
    }

     public function bloodCreate(Request  $req)
    {
    	$validation = Validator::make($req->all(), [

            'bloodgroup'=>'required',
            'donate'=>'required',
            'name'=>'required',
            'number'=>'required|numeric',
            'email'=> 'required|regex:/^.+@.+$/i',
            'address'=>'required'
        ])->validate();

            $user  = new Blood();
            $user->bloodgroup = $req->bloodgroup; 
            $user->donate = $req->donate;
            $user->name = $req->name;
            $user->number = $req->number;
            $user->email = $req->email;
            $user->address = $req->address;
            $user->save();
        
            $req->session()->flash('msg', "Blood Doner Details Is Successfully Added");
            
            return redirect()->route('nurse.addblood');

    }


	public function editblood($sid)
    {
    	       $user = Blood::Find($sid);
	            return view('nurse.editBlood', ['user' => $user]);
    }

	public function editBloodBank(Request $req, $sid)
	{
	
	  $validation = Validator::make($req->all(), [

            'name'=>'required',
            'email'=>'required',
            'number'=>'required',
            'address'=>'required',
            'bloodgroup'=>'required',
            'donate'=>'required'

        ])->validate();

	            $user = Blood::find($sid);
	            $user->name = $req->name; 
	            $user->number = $req->number;
	            $user->email = $req->email;
	            $user->address = $req->address;
	            $user->bloodgroup = $req->bloodgroup;
	            $user->donate = $req->donate;
	            $user->save();
	            
		        return redirect()->route('nurse.bloodlist');

    }


     public function deleteblood($sid)
     {
    	
    	$s = Blood::find($sid);
    	return view('nurse.deleteBlood', ['d'=> $s]);
    	
    }


    public function destroyblood($sid)
    {
       
        Blood::destroy($sid);
        return redirect()->route('nurse.bloodlist');
      
    }
    
    //Blood Part Ends

     //Start Bed Allotment Part   

    public function addbed()
    {
    	$user = User::all()->where('type', 'patient');
    	return view('nurse.addBed', ['user'=>$user]);
    }

     public function bedCreate(Request  $req)
    {
    	$validation = Validator::make($req->all(), [

            'word'=>'required',
            'bedno'=>'required',
            'name'=>'required|unique:beds'
        ])->validate();

           
            $user  = new Bed();
            $user->word = $req->word; 
            $user->bedno = $req->bedno;
            $user->name = $req->name;
            $user->save();
        
            $req->session()->flash('msg', "Bed Is Successfully Allocated");
            
            return redirect()->route('nurse.addbed');

    }

    public function bedlist(Request $req)
    {
    	$bed = Bed::all();
       return view('nurse.BedList', ['bed' => $bed]);
    }

	public function editbed($sid)
    {
    	       $user = Bed::Find($sid);
	            return view('nurse.editBed', ['user'=>$user]);
    }

	public function editBedAllot(Request $req, $sid)
	{
	
	  $validation = Validator::make($req->all(), [

            'word'=>'required',
            'bedno'=>'required'

        ])->validate();

	            $user = Bed::find($sid);
	            $user->word = $req->word; 
	            $user->bedno = $req->bedno;
	            $user->save();
	            
		        return redirect()->route('nurse.bedlist');

    }


     public function deletebed($sid)
     {
    	
    	$s = Bed::find($sid);
    	return view('nurse.deleteBed', ['d'=> $s]);
    	
    }


    public function destroybed($sid)
    {
       
        Bed::destroy($sid);
        return redirect()->route('nurse.bedlist');
      
    }
    //BedAllot Part End
    
    //Prescription Starts
     
     public function prescriptionlist(Request $req)
    {
       $prescrip = Prescription::all();
	   return view('nurse.PrescriptionList', ['prescrip' => $prescrip]);
    }

    //Prescription Ends

    //Operation Part Starts
      public function operationlist(Request $req)
    {
       $user = Report::all();
    	return view('nurse.OperationList', ['user'=>$user]);
    
    }
    //Operation Part Ends

    //Appoint Request Part Starts

     public function appointreq(Request $req)
    {
       $appoint = User::all()->where('type','patient')->where('validation','invalid');
	   return view('nurse.AppointList', ['appoint' => $appoint]);
    	
    }

    public function valid(Request $req)
    {
       $sid = $req->sid;
       $user = User::find($sid);

	    $user->name = $req->name; 
	    $user->number = $req->number;
        $user->email = $req->email;
	    $user->address = $req->address;
	    $user->doctorName = $req->doctorName;
       $user->validation = $req->valid;
	   $user->save();
	   
	   return redirect()->route('nurse.appointreq');	
    }

    public function deleteappoint($sid)
    {
    	User::destroy($sid);
        return redirect()->route('nurse.appointreq');
      
    }

    //Appoint Request Part Ends


    //Profile Part Starts

    public function profile(Request $req)
    {

       $uname = $req->session()->get('id');
      
       $profile = User::Find($uname);
     
       return view('nurse.editProfile', ['profile' => $profile]);
       
    }

    public function editProfile(Request $req)
    {
        $validation = Validator::make($req->all(), [

            'name'=>'required',
            'email'=>'required',
            'number'=>'required',
            'address'=>'required'

        ])->validate();
            
                $sid = $req->session()->get('id');

	            $user = User::find($sid);
	            
	            $user->name = $req->name; 
	            $user->number = $req->number;
	            $user->email = $req->email;
	            $user->address = $req->address;
	            
	            $user->save();
	            
	            $req->session()->flash('msg', "Profile Successfully Updated");
	            
		        return redirect()->route('nurse.profile');
 
    }

    //Profile  Part Ends

    //Change Password

    public function cngpassword()
    {
        return view('nurse.CngPassword');
    }

    public function Password(Request $req)
    {
        $validation = Validator::make($req->all(), [

            'old'=>'required',
            'new'=>'required',
            'confirm'=>'required|same:new'

        ])->validate();

        $sid = $req->session()->get('id');

        $user = User::all()->where('id', $sid)
                           ->where('password', $req->old);
        
        if(count($user) > 0)
        {

        	    $sid1 = $req->session()->get('id'); 
        	    $user1 = User::find($sid1);
                
                $user1->password = $req->new;
	            
	            $user1->save();
	            
	            $req->session()->flash('msg', "Password Successfully Changed");
	            
		        return redirect()->route('nurse.cngpassword');
 
        }

        else
        {
        	 $req->session()->flash('msg2', "Previous Password Doesn't Matched");
	         return redirect()->route('nurse.cngpassword');    
        } 
       
    }


}
