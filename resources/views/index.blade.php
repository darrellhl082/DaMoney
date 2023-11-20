@extends('layouts.main')
@section('main')
<div class="container-fluid">
    <div class="row">
        @include('layouts.components.sidebar')
        <div class="col-md-6 p-4">
          
            <div class="fyp d-flex flex-column justify-content-center ">
              @foreach ($talks as $talk)
              @include('layouts.components.card')
              @endforeach
            </div>
        </div>
      @include('layouts.components.right_bar')
  </div>
@endsection

