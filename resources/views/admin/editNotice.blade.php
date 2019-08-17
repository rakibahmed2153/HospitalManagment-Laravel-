@extends('admin.layout.main')


@section('Name')
   Notie/EditNotie
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <form method="post">
                        @csrf
                        <h2  class="text-center">Update Notie Information</h2>
                        <hr>
                        
                        <label>Title</label>
   								      <input type="text" class="form-control" name="title" value="{{$notice['title']}}">  
                        <br>
                        <label>Subject</label>
             						  <input type="text" class="form-control" name="subject" placeholder="Enter The Subject" value="{{$notice['subject']}}">  
                          <br>
   						          <label>Message</label>
                          <textarea class="form-control" rows="4" cols="100" name="message" placeholder="Enter The Message">{{$notice['message']}}</textarea>
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