@extends('admin.layout.main')


@section('Name')
   Doctort/EditDoctor
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <form method="post" enctype="multipart/form-data">
                        @csrf
                        <h2  class="text-center">Update Doctor Information</h2>
                        <hr>
                        
                        <label>Doctor Name</label>
   								<input type="text" class="form-control" name="name"value="{{$doct['name']}}">  
                          
   							<br>		
                            <label>Department</label>
                  <br>
                           
                      <select name="dept" class="form-control"  style="width: 100%;">
                        <option value="{{$doct['department']}}">{{$doct['department']}}</option>
                                 @foreach($depart as $d)
                      <option value="{{$d['deptName']}}">{{$d['deptName']}}</option>
                                  @endforeach   
                    </select>
                          
                  <br>
                
                        <label>Email</label>
             						  <input type="text" class="form-control" name="email" placeholder="Enter The Department Name" value="{{$doct['email']}}">  
                                              <br>
   						          <label>Phone Number</label>
                          <input type="text" class="form-control" name="number" placeholder="Enter The Department Name" value="{{$doct['number']}}">  
                                              <br>
                        <label>Address</label>
                          <input type="text" class="form-control" name="address" placeholder="Enter The Department Name" value="{{$doct['address']}}">  
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