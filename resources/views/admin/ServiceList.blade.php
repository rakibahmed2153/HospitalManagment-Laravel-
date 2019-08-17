@extends('admin.layout.main')


@section('Name')
   Service/ServiceList
@endsection
@section('Search')
   <!-- <form id="sidebar-search" action="page_search_results.html" method="post">
            <div class="input-group">
              <input type="text" id="search" name="search" placeholder="Search..">
              <button><i class="fa fa-search"></i></button>
            </div>
    </form> -->
@endsection
@section('Iteams')
               
                  <div class="col-lg-12">
                       <h1 class="text-center">Service Lists</h1>
                       <hr>
                          <br>

                           <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="text-center">
                              <td><b>ID</b></td>
                              <td><b>Service Name</b></td>
                              <td><b>Details</b></td>
                              <td><b>Action</b></td>
                            </tr>
                            </thead>
                            <tbody>
                              
                            
                          @foreach($service as $d)

                            <tr>
                              <td>{{$d['id']}}</td>
                              <td>{{$d['name']}}</td>
                              <td>{{$d['details']}}</td>
                              <td>
                                <a href="{{route('admin.editser', $d['id'])}}" style="color: blue;">Edit</a> | 
                                <a href="{{route('admin.deleteservice', $d['id'])}}" style="color: blue;">Delete</a>
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