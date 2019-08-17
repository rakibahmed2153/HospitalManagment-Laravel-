@extends('doctor.layout.main')


@section('Name')
   BedAllotment/EditBedAllotment
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <form method="post" enctype="multipart/form-data">
                        @csrf
                        <h2  class="text-center">Update BedAllotment Information</h2>
                        <hr>
                        
                        <label>Patient Name</label>
   								        <h5>{{$user['name']}}</h5>        
   							<br>		

                        <label>Word</label>
                        <input type="text" class="form-control" name="word" value="{{$user['word']}}">                    
                         <br>  
                        <label>Bed Number</label>
                         <input type="text" class="form-control" name="bedno" value="{{$user['bedno']}}">                    
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