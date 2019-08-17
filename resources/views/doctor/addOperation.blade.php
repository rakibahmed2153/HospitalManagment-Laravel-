@extends('doctor.layout.main')


@section('Name')
   Operation Report/AddOperation Report
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <h1 class="text-center">Add New Operation Report</h1>
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
                  
                  <label>Date</label>
                      <input type="date" class="form-control" name="date">                    
                       
                    <br>

                  <label>Details</label>
                      <textarea class="form-control" rows="4" cols="100" name="details"></textarea>
                        
                      <br>                    
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