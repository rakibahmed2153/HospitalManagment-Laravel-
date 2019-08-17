@extends('doctor.layout.main')


@section('Name')
   Prescription/AddPrescription
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <h1 class="text-center">Add New Prescription</h1>
                      <hr>
                      <form method="post" enctype="multipart/form-data">
                @csrf
                  <label>Patient Name</label>
                  <br>
                           
                      <select name="name" class="form-control"  style="width: 100%;">
                                 @foreach($user as $d)
                      <option value="{{$d['name']}}">{{$d['name']}}</option>
                                  @endforeach   
                    </select>
                          
                  <br>
                  
                  <label>Problem Details</label>
                     <textarea class="form-control" rows="6" cols="100" name="problem" placeholder="Enter You Problem Details"></textarea>
                    <br>

                  <label>Prescription</label>
                     <textarea class="form-control" rows="6" cols="100" name="prescrip"></textarea>
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