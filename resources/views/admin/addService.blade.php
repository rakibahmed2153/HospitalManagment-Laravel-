@extends('admin.layout.main')


@section('Name')
   Service/AddService
@endsection

@section('Iteams')
               

                  <div class="col-lg-6" style="margin-left: 260px;">
                      <form method="post" enctype="multipart/form-data">
                        @csrf
                        <h2  class="text-center">Create Service</h2>
                        <hr>
                      	
                          <label>Service Name</label>
                        
                          <input type="text" class="form-control" name="name" placeholder="Enter The Service Name">  
                          <br>
                        <label>Service Details</label>
   						  <textarea class="form-control" rows="6" cols="500" name="details" placeholder="Enter The Details"></textarea>
                          <br>
   						<label>Upload Picture</label>
                            <input type="file" class="form-control" name="picture"> 
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