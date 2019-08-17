@extends('doctor.layout.main')


@section('Name')
   Operation Report/EditOperation Report
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <form method="post" enctype="multipart/form-data">
                        @csrf
                        <h2  class="text-center">Update Operation Report Information</h2>
                        <hr>
                        
                        <label>Patient Name</label>
   								        <h5>{{$user['name']}}</h5>        
   							<br>		

                        <label>Date</label>
                        <input type="text" class="form-control" name="date" value="{{$user['date']}}">                    
                         <br>  
                        <label>Details</label>
                         <textarea class="form-control" rows="4" cols="100" name="details">{{$user['details']}}</textarea>
                                          
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