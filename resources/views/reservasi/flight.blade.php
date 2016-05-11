@extends('layouts.app_flight')

@section('content')

<div class="">
  <h3>Search Flight</h3>
  <div class="row">
    <div class="col s12">
      <div class="row">
        <div class="col s6">
          <select type="text" name="from" id="from" class="browser-default">
            @foreach($airport as $key)
            <option value="{{$key->airport_code}}">
              {{$key->airport_name}} {{$key->airport_code}}
            </option>
            @endforeach
          </select>
        </div>

        <div class="col s6">
          <select type="text" name="to" id="name" class="browser-default">
            @foreach($airport as $key)
            <option value="{{$key->airport_code}}">
              {{$key->airport_name}} ({{$key->airport_code}})
            </option>
            @endforeach
          </select>
          <br />
        </div>
        <div class="col s2">
          <select type="text" id="type" onchange="check_type()" class="browser-default">
            <option value="OW">Oneway</option>
            <option value="RT">Roundtrip</option>
          </select>
        </div>

        <div class="col s2">
          <input type="text" placeholder="Depart Date" class="for_date" id="depart_date" name="depart_date" />
        </div>

        <div class="col s2">
          <input type="text" placeholder="Return Date" class="for_date" id="return_date" name="return_date" />
        </div>

        <div class="col s1">
          <select name="adult" id="adult" class="browser-default">
            @for($i=1;$i<6;$i++)
            <option value="{{$i}}">{{$i}}</option>
            @endfor
          </select>
        </div>

        <div class="col s1">
          <select name="child" id="child" class="browser-default">
            @for($i=0;$i<6;$i++)
            <option value="{{$i}}">{{$i}}</option>
            @endfor
          </select>
        </div>

        <div class="col s1">
          <select name="infant" id="infant" class="browser-default">
            @for($i=0;$i<6;$i++)
            <option value="{{$i}}">{{$i}}</option>
            @endfor
          </select>
        </div>

        <div class="col s3" class="browser-default">
          <span class="btn" onclick="search()" >Search</span>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="result"></div>
@endsection

@section('footer')
<script type="text/javascript">

  $(".for_date").datepicker();

  function check_type(){
    var tipe = $("#type").val();
    if(tipe=="OW"){
      $("#return_date").prop('disabled',true);
    }else{
      $("#return_date").prop('disabled',false);
    }
  }
  check_type();

  function search(){
    $.ajax({
      url:'{{route("ajax_search_flight")}}',
      type:'POST',
      data:{
            from:$("#from").val(),
            to:$("#to").val(),
            type:$("#type").val(),
            depart_date:$('#depart_date').val(),
            return_date:$('#return_date').val(),
            adult:$('#adult').val(),
            child:$('#child').val(),
            infant:$('#infant').val(),
            _token:'{{csrf_token()}}'
           },
      success:function(data) {
            $('#result').html(data);
      }
    });
  }
</script>
@endsection
