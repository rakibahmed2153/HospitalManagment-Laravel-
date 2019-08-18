@extends('admin.layout.main')


@section('Name')
   Department/EditDepartment
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <form method="post" enctype="multipart/form-data">
                        @csrf
                        <h2  class="text-center">Update Department</h2>
                        <hr>
                        
                        <label>Doctor Name</label>
   								<br>
                           
   								    <select name="name" class="form-control"  style="width: 100%;">
                                
               										<option value="{{$depart['name']}}">{{$depart['name']}}</option>
                                                                   
   									</select>
   							<br>		
                          <label>Department Name</label>
                        
                          <input type="text" class="form-control" name="deptName" placeholder="Enter The Department Name" value="{{$depart['deptName']}}">  
                          <br>
                        <label>Department Details</label>
   						  <textarea class="form-control" rows="6" cols="500" name="details" placeholder="Enter The Details">{{$depart['details']}}</textarea>
                          <br>
   						<label>Upload Picture</label>
                            <input type="file" class="form-control" name="picture"> 
                           <br>
                           
                         <input type="submit" class="btn btn-primary" name="submit" value="Submit">
   						 <a href="{{route('admin.departlist')}}">
      <input type="button" value="Cancel">
    </a>
   									    
   							      
   							    
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