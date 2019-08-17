@extends('nurse.layout.main')


@section('Name')
   Blood Doner/EditBlood Doner
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <form method="post" enctype="multipart/form-data">
                        @csrf
                        <h2  class="text-center">Update Blood Doner Information</h2>
                        <hr>
                        
                        <label>Name</label>
   								<input type="text" class="form-control" name="name" value="{{$user['name']}}">  
                          
   							<br>		
                      
                
                        <label>Email</label>
             						  <input type="text" class="form-control" name="email" placeholder="Enter The Email Address" value="{{$user['email']}}">  
                                              <br>
   						          <label>Phone Number</label>
                          <input type="text" class="form-control" name="number" placeholder="Enter The Phone Number" value="{{$user['number']}}">  
                                              <br>
                        <label>Address</label>
                          <input type="text" class="form-control" name="address" placeholder="Enter The Address" value="{{$user['address']}}">  
                                              <br>
                        <label>Blood Group</label>
                          <input type="text" class="form-control" name="bloodgroup" placeholder="Enter The Blood Group" value="{{$user['bloodgroup']}}">  
                        <label>Donate</label>
                          <input type="text" class="form-control" name="donate" placeholder="Enter The Donate Number" value="{{$user['donate']}}">  
                             
                             
                                
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