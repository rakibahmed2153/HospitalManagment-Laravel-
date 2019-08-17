@extends('doctor.layout.main')


@section('Name')
   Prescription/PrescriptionList
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
                       <h1 class="text-center">Prescription Lists</h1>
                       <hr>
                          <br>

                           <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="text-center">
                              <td><b>ID</b></td>
                              <td><b>Patient Name</b></td>
                              <td><b>Doctor Name</b></td>
                              <td><b>Problem</b></td>
                              <td><b>Prescription</b></td>
                              <td><b>Action</b></td>
                            </tr>
                            </thead>
                            <tbody>
                              
                            
                          @foreach($prescrip as $d)

                            <tr>
                              <td>{{$d['id']}}</td>
                              <td>{{$d['name']}}</td>
                              <td>{{$d['doctorName']}}</td>
                              <td>{{$d['problem']}}</td>
                              <td>{{$d['prescrip']}}</td>
                              <td>
                                <a href="{{route('doctor.editprescription', $d['id'])}}" style="color: blue;">Edit</a> | 
                                <a href="{{route('doctor.deleteprescription', $d['id'])}}" style="color: blue;">Delete</a>
                              </td>
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