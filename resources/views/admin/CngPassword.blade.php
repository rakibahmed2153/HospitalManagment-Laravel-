@extends('admin.layout.main')


@section('Name')
    Change Password
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <h1 class="text-center">Change Password</h1>
                      <hr>
                      <form method="post">
                @csrf


                <label>Previous Password</label>
                      <input type="password" class="form-control" name="old" placeholder="Enter The Previous Password">
                  <br>

                <label>New Password</label>
                      <input type="password" class="form-control" name="new" placeholder="Enter The New Password">
                  <br>
                  <label>Confirm Password</label>
                    <input type="password" class="form-control" name="confirm" placeholder="Enter The Password Again">
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