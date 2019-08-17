@extends('nurse.layout.main')


@section('Name')
   Blood Doner/AddBlood Doner
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <h1 class="text-center">Add New Blood Doner</h1>
                      <hr>
                      <form method="post" enctype="multipart/form-data">
                @csrf
                  <label>Name</label>
                  <br>
                      <input type="text" name="name" class="form-control">    
                  <br>
                  
                  <label>Email</label>
                      <input type="text" class="form-control" name="email">                    
                       
                    <br>

                  <label>Phone Number</label>
                      <input type="text" class="form-control" name="number">
                      <br> 

                  <label>Bloog Group</label>
                      <input type="text" class="form-control" name="bloodgroup">
                      <br> 

                  <label>Donate</label>
                      <input type="text" class="form-control" name="donate">
                      <br>     

                  <label>Address</label>
                      <input type="text" class="form-control" name="address">
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