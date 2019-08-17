@extends('admin.layout.main')


@section('Name')
   Department/AddDepartment
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <form method="post" enctype="multipart/form-data">
                        @csrf
                        <h2  class="text-center">Create Department</h2>
                        <hr>
                        <label>Doctor Name</label>
   								<br>
                           
   								    <select name="name" class="form-control"  style="width: 100%;">
                                 @foreach($doctor as $d)
   										<option value="{{$d->name}}">{{$d->name}}</option>
                                  @endforeach   
   									</select>
   							<br>		
                          <label>Department Name</label>
                        
                          <input type="text" class="form-control" name="deptName" placeholder="Enter The Department Name">  
                          <br>
                        <label>Department Details</label>
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