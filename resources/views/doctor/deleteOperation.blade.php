@extends('doctor.layout.main')


@section('Name')
   Operation Report/DeleteOperation Report
@endsection


@section('Iteams')
    <div class="col-lg-6" style="margin-left: 260px;">   
    <h1 class="text-center">Delete Confirmation</h1>
    <hr>        
<table class="table table-striped table-bordered">
    <tr>
      <td>Id  </td>
      <td>{{$d['id']}}</td>
    </tr>
    
    <tr>
      <td>Patient Name </td>
      <td>{{$d['name']}}</td>
    </tr>
    
    <tr>
      <td>Date  </td>
      <td>{{$d['date']}}</td>
    </tr>
    
    <tr>
      <td>Details  </td>
      <td>{{$d['details']}}</td>
    </tr>
    
  </table>
  
  <form method="post">
    @csrf
    <h3>Are You Sure to Delete The Date?</h3>
    <a href="{{route('doctor.operationlist')}}">
      <input type="button" value="Cancel">
    </a>
    <input type="hidden" name="sid" value="{{$d[0]}}">
    <input type="submit" name="delete" value="Confirm">
  </form>
  </div>
@endsection