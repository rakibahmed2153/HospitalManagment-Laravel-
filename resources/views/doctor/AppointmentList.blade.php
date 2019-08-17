@extends('doctor.layout.main')


@section('Name')
   Appointment/AppointmentList
@endsection
@section('Iteams')
               


                  <div class="col-lg-12">
                       <h1 class="text-center">Appointment Lists</h1>
                       <hr>
                          <br>

                           <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="text-center">
                              <td><b>ID</b></td>
                              <td><b>Patient Name</b></td>
                              <td><b>Email</b></td>
                              <td><b>Phone Number</b></td>
                              <td><b>Problem</b></td>
                            </tr>
                            </thead>
                            <tbody>
                              
                            
                          @foreach($appoint as $d)

                            <tr>
                              <td>{{$d['id']}}</td>
                              <td>{{$d['name']}}</td>
                              <td>{{$d['email']}}</td>
                              <td>{{$d['number']}}</td>
                              <td>{{$d['problem']}}</td>
                             </tr>

                            
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