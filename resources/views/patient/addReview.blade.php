@extends('patient.layout.main')


@section('Name')
   Review/AddReview
@endsection

@section('Iteams')
               


<!-- Add Review -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <form method="post" >
                        @csrf
                        <h2  class="text-center">Create Review</h2>
                        <hr>
                        <label>Review</label>
   						  <textarea class="form-control" rows="6" cols="500" name="review" placeholder="Enter The Review"></textarea>
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