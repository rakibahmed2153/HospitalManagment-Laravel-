@extends('doctor.layout.main')


@section('Name')
   NoticeBoard/NoticeBoardList
@endsection
@section('Iteams')
               


                  <div class="col-lg-12">
                       <h1 class="text-center">NoticeBoard Lists</h1>
                       <hr>
                          <br>

                           <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="text-center">
                              <td><b>ID</b></td>
                              <td><b>Title</b></td>
                              <td><b>Subject</b></td>
                              <td><b>Message</b></td>
                            </tr>
                            </thead>
                            <tbody>
                              
                            
                          @foreach($notice as $d)

                            <tr>
                              <td>{{$d['id']}}</td>
                              <td>{{$d['title']}}</td>
                              <td>{{$d['subject']}}</td>
                              <td>{{$d['message']}}</td>
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