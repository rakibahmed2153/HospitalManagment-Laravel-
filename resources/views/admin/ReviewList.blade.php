@extends('admin.layout.main')


@section('Name')
   Review/ReviewList
@endsection
@section('Iteams')
               

            <div class="col-lg-12">
                       <h1 class="text-center">Review Lists</h1>
                       <hr>
                          <br>

                           <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="text-center">
                              <td><b>ID</b></td>
                              <td><b>Patient Name</b></td>
                              <td><b>Email</b></td>
                              <td><b>Phone Number</b></td>
                              <td><b>Review</b></td>
                              <!--<td><b>Action</b></td>-->
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($review as $d)

                                <tr>
                              <td>{{$d['id']}}</td>
                              <td>{{$d['name']}}</td>
                              <td>{{$d['email']}}</td>
                              <td>{{$d['number']}}</td>
                              <td>{{$d['review']}}</td>
                             <!--  <td>
                              <a href="{{route('admin.deletereview', $d['id'])}}">
                                    <input type="button" class="btn btn-primary" value="Delete" style="background-color: red;">
                                  </a>
                              </td>-->
                            </tr>
                            
                            @endforeach 
                          
                            </tbody>
                  </table>

                  </div>  

@endsection

