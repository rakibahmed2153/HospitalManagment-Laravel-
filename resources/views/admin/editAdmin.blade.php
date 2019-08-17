@extends('admin.layout.main')


@section('Name')
   Admin/EditAdmin
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <form method="post" enctype="multipart/form-data">
                        @csrf
                        <h2  class="text-center">Update Admin Information</h2>
                        <hr>
                        
                        <label>Admin Name</label>
   								<input type="text" class="form-control" name="name" value="{{$admin['name']}}">  
                          
   							<br>		
                
                        <label>Email</label>
             						  <input type="text" class="form-control" name="email" placeholder="Enter The Email" value="{{$admin['email']}}">  
                                              <br>
   						          <label>Phone Number</label>
                          <input type="text" class="form-control" name="number" placeholder="Enter The Phone Number" value="{{$admin['number']}}">  
                                              <br>
                        <label>Address</label>
                          <input type="text" class="form-control" name="address" placeholder="Enter The Address" value="{{$admin['address']}}">  
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