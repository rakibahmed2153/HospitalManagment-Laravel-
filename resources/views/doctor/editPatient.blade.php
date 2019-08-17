@extends('doctor.layout.main')


@section('Name')
   Patient/EditPatient
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <form method="post" enctype="multipart/form-data">
                        @csrf
                        <h2  class="text-center">Update Patient Information</h2>
                        <hr>
                        
                        <label>Patient Name</label>
   								<input type="text" class="form-control" name="name" value="{{$user['name']}}">  
                          
   							<br>		
                            <label>Doctor Name</label>
                  <br>
                           
                      <select name="doctorName" class="form-control"  style="width: 100%;">
                        <option value="{{$user['doctorName']}}">{{$user['doctorName']}}</option>
                                 @foreach($doctor as $d)
                      <option value="{{$d['name']}}">{{$d['name']}}</option>
                                  @endforeach   
                    </select>
                          
                  <br>
                
                        <label>Email</label>
             						  <input type="text" class="form-control" name="email" placeholder="Enter The Department Name" value="{{$user['email']}}">  
                                              <br>
   						          <label>Phone Number</label>
                          <input type="text" class="form-control" name="number" placeholder="Enter The Department Name" value="{{$user['number']}}">  
                                              <br>
                        <label>Address</label>
                          <input type="text" class="form-control" name="address" placeholder="Enter The Department Name" value="{{$user['address']}}">  
                                              <br>

                        <label>Problem Details</label>
                        <textarea class="form-control" rows="4" cols="100" name="problem" placeholder="Enter You Problem Details">{{$user['problem']}}</textarea>
                         <br>                      
                           
                         <input type="submit" class="btn btn-primary" name="submit" value="Submit">
   						 						    
   							      
   							    
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