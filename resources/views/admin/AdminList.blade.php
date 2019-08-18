@extends('admin.layout.main')


@section('Name')
   Admin/AdminList
@endsection
@section('Search')
    <form id="sidebar-search">
            <div class="input-group">
              <input type="text" id="search" name="search" placeholder="Search..">
              <button><i class="fa fa-search"></i></button>
            </div>
    </form>
@endsection
@section('Iteams')
               
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

                  <div class="col-lg-12">
                       <h1 class="text-center">Admin List</h1>
                       <hr>
                          <br>

                           <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="text-center">
                              <td><b>ID</b></td>
                              <td><b>Admin Name</b></td>
                              <td><b>Email</b></td>
                              <td><b>Phone Number</b></td>
                              <td><b>Address</b></td>
                              <td><b>Action</b></td>
                            </tr>
                            </thead>
                            <tbody>
                              
                            
                            </tbody>
                  </table>

                  </div>  


                  <script>
                    $(document).ready(function(){

                     fetch_customer_data();

                     function fetch_customer_data(query = '')
                     {
                      $.ajax({
                       url:"{{ route('admin.searchadmin') }}",
                       method:'GET',
                       data:{query:query},
                       dataType:'json',
                       success:function(data)
                       {
                        $('tbody').html(data.table_data);
                        //$('#total_records').text(data.total_data);
                       }
                      })
                     }

                     $(document).on('keyup', '#search', function(){
                      var query = $(this).val();
                      fetch_customer_data(query);
                     });
                    });
                    </script>
@endsection
