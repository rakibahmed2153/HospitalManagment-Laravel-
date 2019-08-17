@extends('admin.layout.main')


@section('Name')
   Inbox 
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-12">
                       <h1 class="text-center">INBOX</h1>
                       <hr>
                          <br>

                           <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="text-center">
                              <td><b>ID</b></td>
                              <td><b>Name</b></td>
                              <td><b>Email</b></td>
                              <td><b>Subject</b></td>
                              <td><b>Message</b></td>
                              <td><b>Action</b></td>
                            </tr>
                            </thead>
                            <tbody>
                              
                            
                          @foreach($inbox as $d)
                          
                            @csrf
                            <tr>
                              <td>{{$d['id']}}</td>
                              <td>{{$d['name']}}</td>
                              <td>{{$d['email']}}</td>
                              <td>{{$d['subject']}}</td>
                              <td>{{$d['message']}}</td>
                              <td>
                               <a href="{{route('admin.deleteinbox', $d['id'])}}">
                                    <input type="button" class="btn btn-primary" value="Delete" style="background-color: red;">
                                  </a>
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