@extends('layouts.app')


@section('content')

<div class="text-center m-5">
<h1>Looking for tennis partner?</h1>
</div>

<!-- search input  -->
<form action="/search" method="get">
  {{ csrf_field() }}
    <div class="input-group m-2 w-50 mx-auto mb-5">
        <input type="text" class="form-control" name="search" placeholder="Search location">
          <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
    </div>
</form>


  @foreach($players as $player)
  <div class="card m-2 w-50 mx-auto">
    <div class="m-3">
      <h5><a href="/players/{{$player->id}}">{{$player->name}}</a></h5>
      <p>Gender: {{$player->gender}}    Level: {{$player->level}}    Age: {{$player->age}}</p>
      <p>Location: {{$player->location}}</p>
    </div>
  </div>

@endforeach




@endsection
