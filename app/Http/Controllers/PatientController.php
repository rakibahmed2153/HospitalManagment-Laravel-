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

class PatientController extends Controller
{
	public function index(Request $req)
    {

            $name = $req->session()->get('name');

            $doctor = User::all()->where('type','doctor');
            $totalDoc = $doctor->count();


            $nurse = User::all()->where('type','nurse');
            $totalNur = $nurse->count();
            
            $bed = Bed::all()->where('name', $name);
            $totalBed = $bed->count();
            
            $blood = Blood::all();
            $totalblood = $blood->count();
            
            $prescrip = Prescription::all()->where('name', $name);
            $totalPres = $prescrip->count();
            
            $report = Report::all()->where('name', $name);
            $totalRep = $report->count();
           
            
            $appoint = User::all()->where('name', $name);
            $totalSer = $appoint->count();

            $notice = Notice::all();
            $totalnote = $notice->count();
            
            return view('patient.index',['doc' => $totalDoc, 'bed' => $totalBed, 'blood' => $totalblood, 'pres' => $totalPres, 'ser' => $totalSer, 'note' => $totalnote, 'report' => $totalRep, 'nur' => $totalNur]);
       
    
    }

    //Notice Part Start
    public function noticelist(Request $req)
    {
    	$notice = Notice::all();
    	return view('patient.NoticeList', compact('notice'));
    }
    
    //Notice Part Ends

     //Blood Part Start
    public function bloodlist(Request $req)
    {
    	$blood = Blood::all();
    	return view('patient.BloodList', compact('blood'));
    }

    //Bed
    public function bedlist(Request $req)
    {
    	$name = $req->session()->get('name');
    	$bed = Bed::all()->where('name', $name);
        return view('patient.BedList', ['bed' => $bed]);
    }
     
    //Prescription List 
     public function prescriptionlist(Request $req)
    {
       $name = $req->session()->get('name');
       $prescrip = Prescription::all()->where('name', $name);
	   return view('patient.PrescriptionList', ['prescrip' => $prescrip]);
    }

    //Operation Part Starts
      public function operationlist(Request $req)
    {
    	$name = $req->session()->get('name');
       $user = Report::all()->where('name', $name);
    	return view('patient.OperationList', ['user'=>$user]);
    
    }

    //Doctor
    public function doctorlist()
    {
       $doctor = User::all()->where('type','doctor');
	   return view('patient.DoctorList', ['doct' => $doctor]);    	
    }

    //Doctor
    public function nurselist()
    {
       $nurse = User::all()->where('type','nurse');
	   return view('patient.NurseList', ['doct' => $nurse]);    	
    }

    //Profile Part Starts

    public function profile(Request $req)
    {

       $uname = $req->session()->get('id');
      
       $profile = User::Find($uname);
     
       return view('patient.editProfile', ['profile' => $profile]);
       
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
	            
		        return redirect()->route('patient.profile');
 
    }

    //Profile  Part Ends

    //Change Password

    public function cngpassword()
    {
        return view('patient.CngPassword');
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
	            
		        return redirect()->route('patient.cngpassword');
 
        }

        else
        {
        	 $req->session()->flash('msg2', "Previous Password Doesn't Matched");
	         return redirect()->route('patient.cngpassword');    
        } 
       
    }

    public function review()
    {
         return view('patient.addReview');
    }

public function GiveReview(Request $req)
    {
        $validation = Validator::make($req->all(), [

            'review'=>'required',

        ])->validate();

        $sid = $req->session()->get('id');

        $user = User::find($sid);
        
                
                $user->review = $req->review;
                
                $user->save();
                
                $req->session()->flash('msg', "Review Successfully Added");
                
                return redirect()->route('patient.review');
 
        

       
    }



    
}
