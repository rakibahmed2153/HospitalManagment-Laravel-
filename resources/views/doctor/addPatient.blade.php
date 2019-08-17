@extends('doctor.layout.main')


@section('Name')
   Patient/AddPatient
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <h1 class="text-center">Add New Patient</h1>
                      <hr>
                      <form method="post" enctype="multipart/form-data">
                @csrf
                <label>Patient Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Enter You Name">
                  <br>
                  <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter You Email Address">
                   <br>
                  <label>Phone Number</label>
                    <input type="text" class="form-control" name="number" placeholder="Enter You Phone Number">
                  <br>
                           <label>Address</label>
                               <input type="text" class="form-control" name="address" placeholder="Enter Your Address">
                           <br>
                  <label>Doctor Name</label>
                  <br>
                           
                      <select name="doctorName" class="form-control"  style="width: 100%;">
                                 @foreach($User as $d)
                      <option value="{{$d['name']}}">{{$d['name']}}</option>
                                  @endforeach   
                    </select>
                          
                  <br>
                  
                  <label>Problem Details</label>
                     <textarea class="form-control" rows="6" cols="100" name="problem" placeholder="Enter You Problem Details"></textarea>
                    <br>
                  <br>
                     <label>Profile Picture</label>
                     <input type="file" class="form-control" name="picture"> 
                            <br>
                    <label>Username</label>
                      <input type="text" class="form-control" name="username" placeholder="Enter A Unique Username">
                  <br>
                  <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter A Password">
                  <br>
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword" placeholder="Enter The Password Again">
                                 <br>
                      <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <input style="background-color: red;" type="reset" class="btn btn-primary" name="reset" value="Reset">
                        
                </form>
                      <br>
								<br>
                         <div style="color: green;">
                           {{session('msg')}}
                         </div>
                        
                          <div style="color: red;">
                           {{session('msg2')}}
                         </div>
                  
								<div style="color: red;">

                                   @foreach($errors->all() as $err)
									{{$err}} <br>
								   @endforeach
                                </div>

                  </div>  
@endsection