@extends('nurse.layout.main')


@section('Name')
   Appointment Requests
@endsection
@section('Search')
    <form id="sidebar-search" action="page_search_results.html" method="post">
            <div class="input-group">
              <input type="text" id="search" name="search" placeholder="Search..">
              <button><i class="fa fa-search"></i></button>
            </div>
    </form>
@endsection
@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-12">
                       <h1 class="text-center">Requested Patient Lists</h1>
                       <hr>
                          <br>

                           <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="text-center">
                              <td><b>ID</b></td>
                              <td><b>Patient Name</b></td>
                              <td><b>Doctor Name</b></td>
                              <td><b>Email</b></td>
                              <td><b>Phone Number</b></td>
                              <td><b>Address</b></td>
                              <td><b>Action</b></td>
                            </tr>
                            </thead>
                            <tbody>
                              
                            
                          @foreach($appoint as $d)
                          <form method="post">
                            @csrf
                            <tr>
                              <td>{{$d['id']}}</td>
                              <td>{{$d['name']}}</td>
                               <input type="hidden" name="name" value="{{$d['name']}}">
                              <td>{{$d['doctorName']}}</td>
                               <input type="hidden" name="doctorName" value="{{$d['doctorName']}}">
                              <td>{{$d['email']}}</td>
                               <input type="hidden" name="email" value="{{$d['email']}}">
                              <td>{{$d['number']}}</td>
                               <input type="hidden" name="number" value="{{$d['number']}}">
                              <td>{{$d['address']}}</td>
                               <input type="hidden" name="address" value="{{$d['address']}}">
                              <td>
                                <input type="hidden" name="sid" value="{{$d['id']}}">
                                <input type="hidden" name="valid" value="valid"> 
                               
                               <input type="submit" name="submit" value="Valid" class="btn btn-primary" style="background-color: green;">
                               <a href="{{route('nurse.deleteappoint', $d['id'])}}">
                                    <input type="button" class="btn btn-primary" value="Delete" style="background-color: red;">
                                  </a>
                              </td>
                            </tr>
                            </form>

                            
                            @endforeach 
                            </tbody>
                  </table>

                  </div>  
@endsection

@section('Script')
   <script>
    
    fetch_customer_data();

     $(document).ready(function(){

         function fetch_customer_data(query == '')
         {
           $.ajax({
               url:"",
               method:'GET',
               data:{query:query},
               dataType:'json'
               success:function(data)
               {
                $('tbody').html(data.table_data);
               }

           })
         }

      })

      $document.on('keyup', '#search',function(){
        var query = $(this).val();
        fetch_customer_data(query);
      })

   </script>
@endsection