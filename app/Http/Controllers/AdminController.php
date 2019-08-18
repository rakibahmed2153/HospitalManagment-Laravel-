<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use App\Contact;
use App\Notice;
use App\Service;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{


    public function index(Request $req)
    {
    	    $doctor = User::all()->where('type','doctor');
            $totalDoct = $doctor->count();

            $patient = User::all()->where('type','patient');
            $totalPact = $patient->count();
            
            $nurse = User::all()->where('type','nurse');
            $totalNur = $nurse->count();
            
            $admin = User::all()->where('type','admin');
            $totalAdmin = $admin->count();
            
            $department = Department::all();
            $totalDept = $department->count();
            
            $service = Service::all();
            $totalSer = $service->count();

            $notice = Notice::all();
            $totalnote = $notice->count();
            
            return view('admin.index',['doc' => $totalDoct, 'pat' => $totalPact, 'nur' => $totalNur, 'adm' => $totalAdmin, 'dep' => $totalDept, 'ser' => $totalSer, 'note' => $totalnote]);
       
    
    }
 //Department Start

    public function adddepart(Request $req)
    {
    	
            $doctor = DB::table('users')->where('type', 'doctor')->get();
	            return view('admin.addDepartment',compact('doctor'));
	   
    }

    public function deptCreate(Request $req)
    {
    		$validation = Validator::make($req->all(), [

            'deptName'=>'required',
            'details'=>'required'
        ])->validate();


     if($req->hasFile('picture')){
          
           $file = $req->file('picture');
          

	        if($file->getMimeType() == 'image/jpeg'){
	            
	            $dept  = new Department();
	            $dept->name = $req->name; 
	            $dept->deptName = $req->deptName;
	            $dept->details = $req->details;
	             $file->move('upload/departments', $req->deptName.'.jpeg');
	            $dept->save();
	        
	            $req->session()->flash('msg', "Department Successfully Added");
	            
		        return redirect()->route('admin.adddepart');


	           
	        }
	           else{
	           $req->session()->flash('msg2', "Please Upload jpeg File");
	            
	            return redirect()->route('admin.adddepart');
	           }
	        }
	       else{
	           $req->session()->flash('msg2', "Picture Not Found");
	            
	         return redirect()->route('admin.adddepart');

	        }    
		 
    }
    public function departlist(Request $req)
    {
             //$dept = Department::all();
                return view('admin.DepartmentList');        
    }

    public function search(Request $request)
    {
        if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('departments')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('deptName', 'like', '%'.$query.'%')
         ->get();
         
      }
      else
      {
       $data = DB::table('departments')->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
        <td>'.$row->id.'</td>
         <td>'.$row->name.'</td>
         <td>'.$row->deptName.'</td>
         <td>'.$row->details.'</td>
         <td>
            <a href="/admin/EditDepartment/'.$row->id.'" style="color: blue;">Edit</a> | 
            <a href="/admin/DepartmentDelete/'.$row->id.'" style="color: blue;">Delete</a>
                              </td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       //'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
        

public function editdept(Request $req, $sid)
    {
    	      $dept = Department::Find($sid);
	            return view('admin.editDepartment', ['depart' => $dept]);
    }

public function editDepart(Request $req, $sid)
{
	
	  $validation = Validator::make($req->all(), [

            'deptName'=>'required',
            'details'=>'required'
        ])->validate();


     if($req->hasFile('picture')){
          
           $file = $req->file('picture');
          

	        if($file->getMimeType() == 'image/jpeg'){
	            
	            $dept = Department::find($sid);
	            $dept->name = $req->name; 
	            $dept->deptName = $req->deptName;
	            $dept->details = $req->details;
	             $file->move('upload/departments', $req->deptName.'.jpeg');
	            $dept->save();
	        
	            $req->session()->flash('msg', "Department Successfully Updated");
	            
		        return redirect()->route('admin.departlist');


	           
	        }
	           else{
	           $req->session()->flash('msg2', "Please Upload jpeg File");
	            
	            return redirect()->route('admin.editdept', $sid);
	           }
	        }
	       else{
	           $req->session()->flash('msg2', "Picture Not Found");
	            
	         return redirect()->route('admin.editdept', $sid);

	        }  

       
    
}

     public function deletedept(Request $req, $sid){
    	
    	$s = Department::find($sid);
    	return view('admin.deleteDepartment', ['d'=> $s]);
    	
    }


    public function destroydept(Request $req, $sid){
       
        Department::destroy($sid);
        return redirect()->route('admin.departlist');
      
    }

    
    
//End Department Part

//Doctor Part Start
    public function adddoctor()
    {
    	$dept = Department::all();
    	return view('admin.addDoctor', ['depart' => $dept]);
    }

    public function doctorCreate(Request  $req)
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
            $user->type = 'doctor';
            $user->name = $req->name;
            $user->department = $req->dept;
            $user->number = $req->number;
            $user->email = $req->email;
            $user->address = $req->address;
             $file->move('upload/users', $req->username.'.jpeg');
            $user->save();
        
            $req->session()->flash('msg', "Doctor Successfully Added");
            
            return redirect()->route('admin.adddoctor');


           
        }
           else{
           $req->session()->flash('msg2', "Please Upload jpeg File");
            
            return redirect()->route('admin.adddoctor');
           }
        }
       else{
           $req->session()->flash('msg2', "Picture Not Found");
            
         return redirect()->route('admin.adddoctor');

        }
    }

    public function doctorlist()
    {
       //$doctor = User::all()->where('type','doctor');
	   return view('admin.DoctorList');    	
    }

    public function searchdoc(Request $request)
    {
        if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        
       $data = DB::table('users')
         ->where('type','doctor')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('email','like','%'.$query.'%')
         ->get();  
      }
      else
      {
       $data = User::all()->where('type','doctor');
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
        <td>'.$row->id.'</td>
         <td>'.$row->name.'</td>
         <td>'.$row->department.'</td>
         <td>'.$row->email.'</td>
         <td>'.$row->number.'</td>
         <td>'.$row->address.'</td>
         <td>
            <a href="/admin/EditDoctor/'.$row->id.'" style="color: blue;">Edit</a> | 
            <a href="/admin/DoctorDelete/'.$row->id.'" style="color: blue;">Delete</a>
                              </td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="7">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       //'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
    

    public function editdoct($sid)
    {
    	       $dept = Department::all();
    	       $user = User::Find($sid);
	            return view('admin.editDoctor', ['doct' => $user, 'depart' => $dept]);
    }

	public function editDoctor(Request $req, $sid)
    {
	
	  $validation = Validator::make($req->all(), [

            'name'=>'required',
            'dept'=>'required',
            'email'=>'required',
            'number'=>'required',
            'address'=>'required'

        ])->validate();

	            $user = User::find($sid);
	            $user->name = $req->name; 
	            $user->department = $req->dept;
	            $user->number = $req->number;
	            $user->email = $req->email;
	            $user->address = $req->address;
	            $user->save();
	            
		        return redirect()->route('admin.doctorlist');

}


     public function deletedoct($sid){
    	
    	$s = User::find($sid);
    	return view('admin.deleteDoctor', ['d'=> $s]);
    	
    }


    public function destroydoct($sid){
       
        User::destroy($sid);
        return redirect()->route('admin.doctorlist');
      
    }
 //End Doctor Part

 //Start Patient Part   

    public function addpatient(Request $req)
    {
    	$user = User::all()->where('type','doctor');
    	return view('admin.addPatient', ['User' => $user]);
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
            
            return redirect()->route('admin.addpatient');


           
        }
           else{
           $req->session()->flash('msg2', "Please Upload jpeg File");
            
            return redirect()->route('admin.addpatient');
           }
        }
       else{
           $req->session()->flash('msg2', "Picture Not Found");
            
         return redirect()->route('admin.addpatient');

        }
    }

    public function patientlist(Request $req)
    {
      // $patient = User::all()->where('type','patient')->where('validation','valid');
	   return view('admin.PatientList');
    }

    public function searchpatient(Request $request)
    {
        if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('users')
         ->where('type','patient')
         ->where('validation','valid')
         ->where('name', 'like', '%'.$query.'%')
         ->get();
         
      }
      else
      {
       $data = DB::table('users')
               ->where('type','patient')->where('validation','valid')
               ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
        <td>'.$row->id.'</td>
         <td>'.$row->name.'</td>
         <td>'.$row->doctorName.'</td>
         <td>'.$row->email.'</td>
         <td>'.$row->number.'</td>
         <td>'.$row->address.'</td>
         <td>
            <a href="/admin/EditPatient/'.$row->id.'" style="color: blue;">Edit</a> | 
            <a href="/admin/PatientDelete/'.$row->id.'" style="color: blue;">Delete</a>
                              </td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="8">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       //'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }


	public function editpact($sid)
    {
    	       $doctor = User::all()->where('type','doctor');
    	       $user = User::Find($sid);
	            return view('admin.editPatient', ['user' => $user, 'doctor' => $doctor]);
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
	            
		        return redirect()->route('admin.patientlist');

}


     public function deletepatient($sid){
    	
    	$s = User::find($sid);
    	return view('admin.deletePatient', ['d'=> $s]);
    	
    }


    public function destroypatient($sid){
       
        User::destroy($sid);
        return redirect()->route('admin.patientlist');
      
    }
    //Patient Part End

    //Nurse Part Start

    public function addnurse(Request $req)
    {
    	$depart = Department::all();
    	return view('admin.addNurse', ['depart' => $depart]);
    }   
    
    public function nurseCreate(Request  $req)
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
            $user->type = 'nurse';
            $user->name = $req->name;
            $user->department = $req->dept;
            $user->number = $req->number;
            $user->email = $req->email;
            $user->address = $req->address;
             $file->move('upload/users', $req->username.'.jpeg');
            $user->save();
        
            $req->session()->flash('msg', "Nurse Successfully Added");
            
            return redirect()->route('admin.addnurse');


           
        }
           else{
           $req->session()->flash('msg2', "Please Upload jpeg File");
            
            return redirect()->route('admin.addnurse');
           }
        }
       else{
           $req->session()->flash('msg2', "Picture Not Found");
            
         return redirect()->route('admin.addnurse');

        }
    }


    public function nurselist(Request $req)
    {
    	//$nurse = User::all()->where('type','nurse');
	    return view('admin.NurseList');
    }
    
    public function searchnurse(Request $request)
    {
        if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        
       $data = DB::table('users')
         ->where('type','nurse')
         ->where('validation','valid')
         ->where('name', 'like', '%'.$query.'%')
         ->get();  
      }
      else
      {
       $data = DB::table('users')
               ->where('type','nurse')->where('validation','valid')
               ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
        <td>'.$row->id.'</td>
         <td>'.$row->name.'</td>
         <td>'.$row->email.'</td>
         <td>'.$row->number.'</td>
         <td>'.$row->address.'</td>
         <td>
            <a href="/admin/EditNurse/'.$row->id.'" style="color: blue;">Edit</a> | 
            <a href="/admin/NurseDelete/'.$row->id.'" style="color: blue;">Delete</a>
                              </td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="7">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       //'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }



    public function editnur($sid)
    {
    	       $dept = Department::all();
    	       $user = User::Find($sid);
	            return view('admin.editNurse', ['doct' => $user, 'depart' => $dept]);
    }

	public function editNurse(Request $req, $sid)
    {
	
	  $validation = Validator::make($req->all(), [

            'name'=>'required',
            'dept'=>'required',
            'email'=>'required',
            'number'=>'required',
            'address'=>'required'

        ])->validate();

	            $user = User::find($sid);
	            $user->name = $req->name; 
	            $user->department = $req->dept;
	            $user->number = $req->number;
	            $user->email = $req->email;
	            $user->address = $req->address;
	            $user->save();
	            
		        return redirect()->route('admin.nurselist');

	}


     public function deletenurse($sid){
    	
    	$s = User::find($sid);
    	return view('admin.deleteNurse', ['d'=> $s]);
    	
    }


    public function destroynurse($sid){
       
        User::destroy($sid);
        return redirect()->route('admin.nurselist');
      
    }
 //End Nurse Part

    public function addnotice(Request $req)
    {
        return view('admin.addNotice');
    }

    public function noticeCreate(Request  $req)
    {
    	$validation = Validator::make($req->all(), [

            'title'=>'required',
            'subject'=>'required',
            'message'=> 'required'
            
        ])->validate();

           DB::table('notices')->insert(
              [ 
              	'title' => $req->title, 
                'subject' => $req->subject, 
                'message' => $req->message
              ]
           );

            
            $req->session()->flash('msg', "Notice Successfully Added");
            
            return redirect()->route('admin.addnotice');      
    }
           

    public function noticelist(Request $req)
    {
    	//$notice = Notice::all();
    	return view('admin.NoticeList');
    }

    public function searchnotice(Request $request)
    {
        if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('notices')
         ->where('title', 'like', '%'.$query.'%')
         ->orWhere('subject', 'like', '%'.$query.'%')
         ->get();
         
      }
      else
      {
       $data = DB::table('notices')->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
        <td>'.$row->id.'</td>
         <td>'.$row->title.'</td>
         <td>'.$row->subject.'</td>
         <td>'.$row->message.'</td>
         <td>
            <a href="/admin/EditNotice/'.$row->id.'" style="color: blue;">Edit</a> | 
            <a href="/admin/NoticeDelete/'.$row->id.'" style="color: blue;">Delete</a>
                              </td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       //'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

    public function editnote($sid)
    {
    	       $notice = Notice::Find($sid);
	            return view('admin.editNotice', ['notice' => $notice]);
    }

	public function editNotice(Request $req, $sid)
    {
	
	  $validation = Validator::make($req->all(), [

            'title'=>'required',
            'subject'=>'required',
            'message'=>'required',
            
        ])->validate();

	            $notice = Notice::find($sid);
	            $notice->title = $req->title; 
	            $notice->subject = $req->subject;
	            $notice->message = $req->message;
	            $notice->save();
	            
		        return redirect()->route('admin.noticelist');

}


     public function deletenotice($sid){
    	
    	$s = Notice::find($sid);
    	return view('admin.deleteNotice', ['d'=> $s]);
    	
    }


    public function destroynotice($sid){
       
        Notice::destroy($sid);
        return redirect()->route('admin.noticelist');
      
    }
    
    //Admin Part Started

    public function addadmin()
    {
    	return view('admin.addAdmin');
    }

    public function adminCreate(Request $req)
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
            $user->type = 'admin';
            $user->name = $req->name;
            $user->number = $req->number;
            $user->email = $req->email;
            $user->address = $req->address;
             $file->move('upload/users', $req->username.'.jpeg');
            $user->save();
        
            $req->session()->flash('msg', "Admin Successfully Added");
            
            return redirect()->route('admin.addadmin');


           
        }
           else{
           $req->session()->flash('msg2', "Please Upload jpeg File");
            
            return redirect()->route('admin.addadmin');
           }
        }
       else{
           $req->session()->flash('msg2', "Picture Not Found");
            
         return redirect()->route('admin.addadmin');

        }
    }

    public function adminlist(Request $req)
    {
    	//$admin = User::all()->where('type','admin');
    	return view('admin.AdminList');
    }

     public function searchadmin(Request $request)
    {
        if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        
       $data = DB::table('users')
         ->where('type','admin')
         ->where('validation','valid')
         ->where('name', 'like', '%'.$query.'%')
         ->get();  
      }
      else
      {
       $data = DB::table('users')
               ->where('type','admin')->where('validation','valid')
               ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
        <td>'.$row->id.'</td>
         <td>'.$row->name.'</td>
         <td>'.$row->email.'</td>
         <td>'.$row->number.'</td>
         <td>'.$row->address.'</td>
         <td>
            <a href="/admin/EditAdmin/'.$row->id.'" style="color: blue;">Edit</a> | 
            <a href="/admin/AdminDelete/'.$row->id.'" style="color: blue;">Delete</a>
                              </td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="7">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       //'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }


    public function editadm($sid)
    {
    	    $admin = User::Find($sid);
	        return view('admin.editAdmin', ['admin' => $admin]);
    }

	public function editAdmin(Request $req, $sid)
    {
	
	  $validation = Validator::make($req->all(), [

            'name'=>'required',
            'email'=>'required',
            'number'=>'required',
            'address'=>'required'

        ])->validate();

	            $user = User::find($sid);
	            $user->name = $req->name; 
	            $user->number = $req->number;
	            $user->email = $req->email;
	            $user->address = $req->address;
	            $user->save();
	            
		        return redirect()->route('admin.adminlist');

	}


     public function deleteadmin($sid){
    	
    	$s = User::find($sid);
    	return view('admin.deleteadmin', ['d'=> $s]);
    	
    }


    public function destroyadmin($sid){
       
        User::destroy($sid);
        return redirect()->route('admin.adminlist');
      
    }

    //Admin Part Ends
    
    //Service Part Starts

    public function addservice(Request $req)
    {
       return view('admin.addService');	
    }

    public function serviceCreate(Request $req)
    {
    		$validation = Validator::make($req->all(), [

            'name'=>'required|unique:services',
            'details'=>'required'

        ])->validate();


     if($req->hasFile('picture')){
          
           $file = $req->file('picture');
          

	        if($file->getMimeType() == 'image/png'){
	            
	            $service  = new Service();
	            $service->name = $req->name; 
	            $service->details = $req->details;
	            $file->move('upload/services', $req->name.'.png');
	            $service->save();
	        
	            $req->session()->flash('msg', "Services Successfully Added");
	            
		        return redirect()->route('admin.addservice');


	           
	        }
	           else{
	           $req->session()->flash('msg2', "Please Upload png File");
	            
	            return redirect()->route('admin.addservice');
	           }
	        }
	       else{
	           $req->session()->flash('msg2', "Picture Not Found");
	            
	         return redirect()->route('admin.addservice');

	        }    
		 
    }

    public function servicelist(Request $req)
    {
             //$service = Service::all();
	         return view('admin.ServiceList');        
    }

    public function searchservice(Request $request)
    {
        if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        
       $data = DB::table('services')
         ->where('name', 'like', '%'.$query.'%')
         ->get();  
      }
      else
      {
       $data = DB::table('services')
               ->orderBy('name','asc')
               ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
        <td>'.$row->id.'</td>
         <td>'.$row->name.'</td>
         <td>'.$row->details.'</td>
         <td>
            <a href="/admin/EditService/'.$row->id.'" style="color: blue;">Edit</a> | 
            <a href="/admin/ServiceDelete/'.$row->id.'" style="color: blue;">Delete</a>
                              </td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="4">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       //'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }


 	public function editser(Request $req, $sid)
    {
    	      $service = Service::Find($sid);
	          // echo $service;
	            return view('admin.editService', ['service' => $service]);
    }

	public function editService(Request $req, $sid)
	{
	
	  $validation = Validator::make($req->all(), [

            'name'=>'required',
            'details'=>'required'
        ])->validate();


                
	            $service = Service::find($sid);
	            $service->name = $req->name; 
	            $service->details = $req->details;
	            $service->save();
	        
	            $req->session()->flash('msg', "Service Successfully Updated");
	            
		        return redirect()->route('admin.servicelist');

    }

     public function deleteservice(Request $req, $sid){
    	
    	$s = Service::find($sid);
    	return view('admin.deleteService', ['d'=> $s]);
    	
    }


    public function destroyservice(Request $req, $sid){
       
        Service::destroy($sid);
        return redirect()->route('admin.servicelist');
      
    }


    //Service Part Ends


    //Profile Part Starts

    public function profile(Request $req)
    {

       $uname = $req->session()->get('id');
      
       $profile = User::Find($uname);
     
       return view('admin.editProfile', ['profile' => $profile]);
       
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
	            
		        return redirect()->route('admin.profile');
 
    }

    //Profile  Part Ends

    //Change Password

    public function cngpassword()
    {
        return view('admin.CngPassword');
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
	            
		        return redirect()->route('admin.cngpassword');
 
        }

        else
        {
        	 $req->session()->flash('msg2', "Previous Password Doesn't Matched");
	         return redirect()->route('admin.cngpassword');    
        } 
       
    }


    //Appoint Request Part Starts

     public function appointreq(Request $req)
    {
       //$appoint = User::all()->where('type','patient')->where('validation','invalid');
	   return view('admin.AppointList');
    	
    }
    
    public function searchappoint(Request $request)
    {
        if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        
       $data = DB::table('users')
         ->where('type','patient')
         ->where('validation','invalid')
         ->where('name', 'like', '%'.$query.'%')
         ->get();  
      }
      else
      {
       $data = DB::table('users')
               ->where('type','patient')->where('validation','invalid')
               ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
        <td>'.$row->id.'</td>
         <td>'.$row->name.'</td>
         <td>'.$row->doctorName.'</td>
         <td>'.$row->email.'</td>
         <td>'.$row->number.'</td>
         <td>'.$row->address.'</td>
         <td>
            <a href="/admin/ValidAppointRequest/'.$row->id.'" style="color: blue;">Valid</a> | 
            <a href="/admin/DeleteAppointRequest/'.$row->id.'" style="color: blue;">Delete</a>
                              </td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="8">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       //'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

    public function valid(Request $req, $sid)
    {
     // $sid = $req->sid;
       $user = User::find($sid);

       $user->validation = 'valid';
	   $user->save();
	   
	   return redirect()->route('admin.appointreq');	
    }

    public function deleteappoint($sid)
    {
    	User::destroy($sid);
        return redirect()->route('admin.appointreq');
      
    }

    //Appoint Request Part Ends

    //Contacts Part Starts

    public function inbox()
    {
    	$inbox = Contact::all();
    	return view('admin.InboxList',['inbox'=>$inbox]);
    }

    public function deleteinbox($sid)
    {
    	Contact::destroy($sid);
        return redirect()->route('admin.inbox');
      
    }

    //Contact Part Ends


    //Contacts Part Starts

    public function review()
    {
        $user = User::all()->where('type','patient');
        
        return view('admin.ReviewList',['review'=>$user]);
        
    }

    public function deletereview($sid)
    {
        Contact::destroy($sid);
        return redirect()->route('admin.review');
      
    }

    //Contact Part Ends

    //The END...
}
