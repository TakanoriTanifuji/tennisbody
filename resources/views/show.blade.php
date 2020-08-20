@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Player Info') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Player Profile</h3>


                        <div class="card m-2">
                          <h5>Name: {{$player->name}}</h5>
                          <h5>Gender: {{$player->gender}}</h5>
                          <h5>Level: {{$player->level}}</h5>
                          <h5>Age: {{$player->age}}</h5>
                          <h5>Location: {{$player->location}}</h5>

                          @if(Auth::check())
                            <button class="btn btn-primary" ><a href="mailto:{{Auth::user()->email}}" class='text-white'>Send Email</a></button>

                          @else
                            <button class="btn btn-primary" onclick="alertFunction()">Send Email</button>
                            <script>
                              function alertFunction()
                              {
                                alert('Please Login');
                              }
                            </script>
                          @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
