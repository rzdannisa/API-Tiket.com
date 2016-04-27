@extends('layouts.app')

@section('content')
<center><bold><h4 style="margin-top:30px;margin-bottom:20px;font-size:40px;">Country</h4></bold></center>

<table class="striped centered" style="width:60%;margin:auto;">
  <thead>
    <tr>
      <th>Country ID</th>
      <th>Country Name</th>
      <th>Country AreaCode</th>
    </tr>
  </thead>
<tbody>
  @foreach($data as $key)
    <tr>
      <td>{{$key->country_id}}</td>
      <td>{{$key->country_name}}</td>
      <td>{{$key->country_areacode}}</td>
    </tr>
  @endforeach
</tbody>
</table>
@endsection
