@extends('layouts.app')

@section('content')

<form method = 'post' action="/players">
  @csrf
  <div class="form-group mt-3">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter name">
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name='gender' value="Male">
    <label class="form-check-label" for="inlineCheckbox1">Male</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name='gender' value="Female">
    <label class="form-check-label" for="inlineCheckbox2">Female</label>
  </div>
    <div class="form-group">
      <label for="level">Level</label>
      <input type="text" class="form-control" name="level" placeholder="Enter Level">
    </div>
    <div class="form-group">
      <label for="age">Age</label>
      <input type="text" class="form-control" name="age" placeholder="Enter Age">
    </div>
    <div class="form-group">
      <label for="location">Location</label>
      <input type="text" class="form-control" name="location" placeholder="Enter Location">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  @endsection
