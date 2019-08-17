@extends('admin.layout.main')


@section('Name')
   Profile/EditProfile
@endsection

@section('Iteams')
               
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <form method="post">
                        @csrf
                        <h2  class="text-center">Update Profile Information</h2>
                        <hr>
                       <label>Name</label>
   								<input type="text" class="form-control" name="name" value="{{ $profile['name'] }}">  
                          
   							<br>		
                
                        <label>Email</label>
             						  <input type="text" class="form-control" name="email" placeholder="Enter The Email" value="{{ $profile['email'] }}">  
                                              <br>
   						          <label>Phone Number</label>
                          <input type="text" class="form-control" name="number" placeholder="Enter The Phone Number" value="{{ $profile['number'] }}">  
                                              <br>
                        <label>Address</label>
                          <input type="text" class="form-control" name="address" placeholder="Enter The Address" value="{{ $profile['address'] }}">  
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