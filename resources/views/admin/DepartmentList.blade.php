@extends('admin.layout.main')


@section('Name')
   Department/DepartmentList
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
                       <h1 class="text-center">Department Lists</h1>
                       <hr>
                          <br>

                           <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="text-center">
                              <td><b>ID</b></td>
                              <td><b>Doctor Name</b></td>
                              <td><b>Department Name</b></td>
                              <td><b>Details</b></td>
                              <td><b>Action</b></td>
                            </tr>
                            </thead>
                            <tbody>
                              
                            
                          @foreach($depart as $d)

                            <tr>
                              <td>{{$d['id']}}</td>
                              <td>{{$d['name']}}</td>
                              <td>{{$d['deptName']}}</td>
                              <td>{{$d['details']}}</td>
                              <td>
                                <a href="{{route('admin.editdept', $d['id'])}}" style="color: blue;">Edit</a> | 
                                <a href="{{route('admin.deletedept', $d['id'])}}" style="color: blue;">Delete</a>
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