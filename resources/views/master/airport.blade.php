@extends('layouts.app')

@section('content')
<center><bold><h4 style="margin-top:30px;margin-bottom:20px;font-size:40px;">Country</h4></bold></center>

<table class="striped centered" style="width:60%;margin:auto;">
  <thead>
    <tr>
      <th>Airport Name</th>
      <th>Airport Code</th>
      <th>Location Name</th>
      <th>Country Id</th>
    </tr>
  </thead>
<tbody>
  @foreach($data as $key)
    <tr>
      <td>{{$key->airport_name}}</td>
      <td>{{$key->airport_code}}</td>
      <td>{{$key->location_name}}</td>
      <td>{{$key->country_id}}</td>
    </tr>
  @endforeach
</tbody>
</table>
@endsection
