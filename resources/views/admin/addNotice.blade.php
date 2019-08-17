@extends('admin.layout.main')


@section('Name')
   Notice/AddNotice
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <h1 class="text-center">Add New Notice</h1>
                      <hr>
                      <form method="post">
                @csrf
                <label>Title</label>
                      <input type="text" class="form-control" name="title" placeholder="Enter The Title">
                  <br>
                  <label>Subject</label>
                    <input type="text" class="form-control" name="subject" placeholder="Enter The Subject">
                   <br>
                   <label>Message</label>
                     <textarea class="form-control" rows="6" cols="100" name="message" placeholder="Enter Your Message"></textarea>
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