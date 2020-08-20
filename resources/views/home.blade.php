@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">


                    <h3>Player Profile</h3>


                        <div class="card m-2">
                          <h5>Name: {{$players->name}}</h5>
                          <h5>Gender: {{$players->gender}}</h5>
                          <h5>Level: {{$players->level}}</h5>
                          <h5>Age: {{$players->age}}</h5>
                          <h5>Location: {{$players->location}}</h5>

                     <a href="/players/{{$players->id}}/edit" class="btn btn-primary">Edit Profile</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
