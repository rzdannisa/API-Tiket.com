@extends('layouts.app')

@section('content')
<center><bold><h4 style="margin-top:30px;margin-bottom:20px;font-size:40px;">Language</h4></bold></center>

<table class="striped centered" style="width:60%;margin:auto;">
  <thead>
    <tr>
      <th>Code</th>
      <th>Long Name</th>
      <th>Short Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $key)
      <tr>
        <td>{{$key->code}}</td>
        <td>{{$key->name_long}}</td>
        <td>{{$key->name_short}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
