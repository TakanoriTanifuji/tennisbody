@extends('layouts.app')



@section('sidebar')

<div class="container-fluid mt-5">
    <div class="row ">
        <div class="col-3 px-1 bg-dark position-fixed h-100" id="sticky-sidebar">

            <!-- search input  -->
            <form action="/search" method="get">
              {{ csrf_field() }}
                <div class="m-5 w-75 mx-auto mb-5">
                    <input type="text" class="form-control" id="address-input" name="location" placeholder="Enter location" value="{{ $location ?? '' }}">
                    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
                    <script>
                      var placesAutocomplete = places({
                        container: document.querySelector('#address-input'),
                        templates: {
                              value: function(suggestion) {
                                return suggestion.name;
                              }
                            }
                          }).configure({
                            type: 'city',
                            aroundLatLngViaIP: false,
                          });
                    </script>

                    <div class="form-group mt-3">
                      <select class="form-control " name="level">
                      <option disabled selected value> select a level </option>
                        <option value="">All</option>
                        <option value=1.0  @if(!empty($level)){{ old('level', $level)=='1.0' ? 'selected' : ''  }}  @endif>1.0</option>
                        <option value=1.5  @if(!empty($level)){{ old('level', $level)=='1.5' ? 'selected' : ''  }}  @endif>1.5</option>
                        <option value=2.5  @if(!empty($level)){{ old('level', $level)=='2.5' ? 'selected' : ''  }}  @endif>2.5</option>
                        <option value=3.0  @if(!empty($level)){{ old('level', $level)=='3.0' ? 'selected' : ''  }}  @endif>3.0</option>
                        <option value=3.5  @if(!empty($level)){{ old('level', $level)=='3.5' ? 'selected' : ''  }}  @endif>3.5</option>
                        <option value=4.0  @if(!empty($level)){{ old('level', $level)=='4.0' ? 'selected' : ''  }}  @endif>4.0</option>
                        <option value=4.5  @if(!empty($level)){{ old('level', $level)=='4.5' ? 'selected' : ''  }}  @endif>4.5</option>
                        <option value=5.0  @if(!empty($level)){{ old('level', $level)=='5.0' ? 'selected' : ''  }}  @endif>5.0</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <select class="form-control " name="gender">
                        <option disabled selected value> select a gender </option>
                        <option value="">All</option>
                        <option value="male" @if(!empty($gender)){{ old('gender', $gender)=='male' ? 'selected' : ''  }}  @endif>Male</option>
                        <option value="female" @if(!empty($gender)){{ old('gender', $gender)=='female' ? 'selected' : ''  }} @endif>Female</option>

                      </select>
                    </div>

                      <div class="input-group-append my-3">
                        <button type="submit" class="btn btn-primary">Search</button>
                      </div>
                </div>
            </form>


        </div>
    </div>

</div>


@endsection



@section('content')



<div class="text-center m-5">
<h1>Looking for tennis partner?</h1>
</div>



  @foreach($players as $player)
  <div class="card m-2 w-50 mx-auto">
    <div class="m-3">
      <h5><a href="/players/{{$player->id}}">{{$player->name}}</a></h5>
      <p>Gender: {{$player->gender}}    Level: {{$player->level}}    Age: {{$player->age}}</p>
      <p>Location: {{$player->location}}</p>
    </div>
  </div>

@endforeach

  <div class="row">
    <div class="col-12 d-flex justify-content-center mt-3 mb-5">
      {{$players->links()}}
    </div>

  </div>



@endsection
