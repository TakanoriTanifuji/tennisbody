@extends('layouts.app')


@section('content')

<div class="text-center m-5">
<h1>Looking for tennis partner?</h1>
</div>

<!-- search input  -->
<form action="/search" method="get">
  {{ csrf_field() }}
    <div class="m-5 w-50 mx-auto mb-5">
        <label for="exampleFormControlSelect1">Location</label>
        <input type="text" class="form-control mb-3" id="address-input" name="location" placeholder="Enter location">
        <script src="https://cdn.jsdelivr.net/places.js/1/places.min.js"></script>
        <script>
          var placesAutocomplete = places({
            container: document.querySelector('#address-input')
          });
        </script>
        <div class="form-group">
          <label for="exampleFormControlSelect1" >Level</label>
          <select class="form-control mb-3" name="level">
          <option disabled selected value> select an option </option>
            <option>1.0</option>
            <option>1.5</option>
            <option>2.5</option>
            <option>3.0</option>
            <option>3.5</option>
            <option>4.0</option>
            <option>4.5</option>
            <option>5.0</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1" >Gender</label>
          <select class="form-control mb-3" name="gender">
            <option disabled selected value> select an option </option>
            <option>Female</option>
            <option>Male</option>
          </select>
        </div>
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
