@extends('layouts.app')

@section('content')
<center><bold><h4 style="margin-top:30px;margin-bottom:20px;font-size:40px;">Currency</h4></bold></center>

<table class="striped centered" style="width:40%;margin:auto;text-align:">
  <thead>
    <tr>
      <th>Code</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $key)
      <tr>
        <td>{{$key->code}}</td>
        <td>{{$key->name}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
