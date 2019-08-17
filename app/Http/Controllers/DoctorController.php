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

class DoctorController extends Controller
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
            
            $prescrip = Prescription::all()->where('doctorName','uname');
            $totalPres = $prescrip->count();
            
            $report = Report::all()->where('doctorName','uname');
            $totalRep = $report->count();
           
            $uname = $req->session()->get('name');
            $appoint = User::all()->where('doctorName', $uname);
            $totalSer = $appoint->count();

            $notice = Notice::all();
            $totalnote = $notice->count();
            
            return view('doctor.index',['pat' => $totalPact, 'bed' => $totalBed, 'blood' => $totalblood, 'pres' => $totalPres, 'ser' => $totalSer, 'note' => $totalnote, 'report' => $totalRep]);
       
    
    }


    //Start Patient Part   

    public function addpatient(Request $req)
    {
    	$user = User::all()->where('type','doctor');
    	return view('doctor.addPatient', ['User' => $user]);
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
            
            return redirect()->route('doctor.addpatient');


           
        }
           else{
           $req->session()->flash('msg2', "Please Upload jpeg File");
            
            return redirect()->route('doctor.addpatient');
           }
        }
       else{
           $req->session()->flash('msg2', "Picture Not Found");
            
         return redirect()->route('doctor.addpatient');

        }
    }

    public function patientlist(Request $req)
    {
       $patient = User::all()->where('type','patient')->where('validation','valid');;
	   return view('doctor.PatientList', ['patient' => $patient]);
    }

	public function editpact($sid)
    {
    	       $doctor = User::all()->where('type','doctor');
    	       $user = User::Find($sid);
	            return view('doctor.editPatient', ['user' => $user, 'doctor' => $doctor]);
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
	            
		        return redirect()->route('doctor.patientlist');

    }


     public function deletepatient($sid)
     {
    	
    	$s = User::find($sid);
    	return view('doctor.deletePatient', ['d'=> $s]);
    	
    }


    public function destroypatient($sid)
    {
       
        User::destroy($sid);
        return redirect()->route('doctor.patientlist');
      
    }
    //Patient Part End


    //Appointment Part Start
    
    public function viewappoint(Request $req)
    {
        
        $uname = $req->session()->get('name');
        //echo $uname;
        $appoint = User::all()->where('doctorName', $uname);
      
        //echo $appoint;
        return view('doctor.AppointmentList', ['appoint' => $appoint]);
    }

    //Appointment Part Ends

    //Notice Part Start
    public function noticelist(Request $req)
    {
    	$notice = Notice::all();
    	return view('doctor.NoticeList', compact('notice'));
    }
    
    //Notice Part Ends

     //Blood Part Start
    public function bloodlist(Request $req)
    {
    	$blood = Blood::all();
    	return view('doctor.BloodList', compact('blood'));
    }
    
    //Blood Part Ends


    //Start operation Part   

    public function addoperation(Request $req)
    {
    	$uname = $req->session()->get('name');
    	$user = User::all()->where('doctorName', $uname);
    	return view('doctor.addOperation', ['user'=>$user]);
    }

     public function operationCreate(Request  $req)
    {
    	$validation = Validator::make($req->all(), [

            'date'=>'required',
            'details'=>'required',
        ])->validate();

           
            $user  = new Report();
            $user->name = $req->name;
            $user->date = $req->date;
            $user->details = $req->details ;
            $user->doctorName = $req->session()->get('name');
            $user->save();
        
            $req->session()->flash('msg', "Report Is Successfully Added");
            
            return redirect()->route('doctor.addoperation');

    }

    public function operationlist(Request $req)
    {
       $uname = $req->session()->get('name');
    	$user = Report::all()->where('doctorName', $uname);
    	return view('doctor.OperationList', ['user'=>$user]);
    
    }

	public function editoperation($sid)
    {
    	$user = Report::Find($sid);
	    return view('doctor.editOperation', ['user' => $user]);
    }

	public function editReport(Request $req, $sid)
	{
	
	  $validation = Validator::make($req->all(), [

            'date'=>'required',
            'details'=>'required'

        ])->validate();

	            $user = Report::find($sid);
	            $user->date = $req->date; 
	            $user->details = $req->details;
	            $user->save();
	            
		        return redirect()->route('doctor.operationlist');

    }


     public function deleteoperation($sid)
     {
    	
    	$s = Report::find($sid);
    	return view('doctor.deleteOperation', ['d'=> $s]);
    	
    }


    public function destroyoperation($sid)
    {
       
        Report::destroy($sid);
        return redirect()->route('doctor.operationlist');
      
    }
    //Operation Part End

    
    //Start Bed Allotment Part   

    public function addbed(Request $req)
    {
    	$uname = $req->session()->get('name');
    	$user = User::all()->where('doctorName', $uname);
    	return view('doctor.addBed', ['user'=>$user]);
    }

     public function bedCreate(Request  $req)
    {
    	$validation = Validator::make($req->all(), [

            'word'=>'required',
            'bedno'=>'required',
            'name'=>'required'
        ])->validate();

           
            $user  = new Bed();
            $user->word = $req->word; 
            $user->bedno = $req->bedno;
            $user->name = $req->name;
            $user->save();
        
            $req->session()->flash('msg', "Bed Is Successfully Added");
            
            return redirect()->route('doctor.addbed');

    }

    public function bedlist(Request $req)
    {
    	$bed = Bed::all();
       return view('doctor.BedList', ['bed' => $bed]);
    }

	public function editbed($sid)
    {
    	       $user = Bed::Find($sid);
	            return view('doctor.editBed', ['user'=>$user]);
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
	            
		        return redirect()->route('doctor.bedlist');

    }


     public function deletebed($sid)
     {
    	
    	$s = Bed::find($sid);
    	return view('doctor.deleteBed', ['d'=> $s]);
    	
    }


    public function destroybed($sid)
    {
       
        Bed::destroy($sid);
        return redirect()->route('doctor.bedlist');
      
    }
    //BedAllot Part End

    //Start Bed Allotment Part   

    public function addprescription(Request $req)
    {
    	
        $uname = $req->session()->get('name');
        //echo $uname;
        $user = User::all()->where('doctorName', $uname);

        return view('doctor.addPrescription', ['user' => $user]);
    }

     public function prescriptionCreate(Request  $req)
    {
    	$validation = Validator::make($req->all(), [

            'prescrip'=>'required',
            'problem'=>'required',
            'name'=>'required',
        ])->validate();

           
            $prescrip  = new Prescription();
            $prescrip->problem = $req->problem; 
            $prescrip->prescrip = $req->prescrip;
            $prescrip->doctorName = $req->session()->get('name');
            $prescrip->name = $req->name;

            $prescrip->save();
        
            $req->session()->flash('msg', "Prescription Is Successfully Added");
            
            return redirect()->route('doctor.addprescription');

    }

    public function prescriptionlist(Request $req)
    {

        $uname = $req->session()->get('name');
       $prescrip = Prescription::all()->where('doctorName', $uname);
	   return view('doctor.PrescriptionList', ['prescrip' => $prescrip]);
    }

	public function editprescription($sid)
    {
    	       //$doctor = User::all()->where('type','doctor');
    	       $user = Prescription::Find($sid);
	           return view('doctor.editPrescription', ['user' => $user]);
    }

	public function editPrescrip(Request $req, $sid)
	{
	
	  $validation = Validator::make($req->all(), [

            'problem'=>'required',
            'prescrip' => 'required'

        ])->validate();

	            $user = Prescription::find($sid);
	            $user->prescrip = $req->prescrip;
	            $user->problem = $req->problem;
	            $user->save();
	            
		        return redirect()->route('doctor.prescriptionlist');

    }


     public function deleteprescription($sid){
    	
    	$s = Prescription::find($sid);
    	return view('doctor.deletePrescription', ['d'=> $s]);
    	
    }


    public function destroyprescription($sid){
       
        Prescription::destroy($sid);
        return redirect()->route('doctor.prescriptionlist');
      
    }
    //End Prescription Part
 
    //Profile Part Starts

    public function profile(Request $req)
    {

       $uname = $req->session()->get('id');
      
       $profile = User::Find($uname);
     
       return view('doctor.editProfile', ['profile' => $profile]);
       
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
	            
		        return redirect()->route('doctor.profile');
 
    }

    //Profile  Part Ends

    //Change Password

    public function cngpassword()
    {
        return view('doctor.CngPassword');
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
	            
		        return redirect()->route('doctor.cngpassword');
 
        }

        else
        {
        	 $req->session()->flash('msg2', "Previous Password Doesn't Matched");
	         return redirect()->route('doctor.cngpassword');    
        } 
       
    }

    
}
