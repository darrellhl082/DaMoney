
@extends('layouts.main')
@section('main')
<div class="container-fluid">
    <div class="row">
        @include('layouts.components.sidebar')
        <div class="col-md-6 p-4">
            <div class="hero pb-2 mb-1">
                <div class="avatar border-none d-block "style="background-image: url('/img/{{ $user->avatar }}');  border:1px solid #c7c3c3">
                </div>
                <h5 class="card-title mt-3 name d-block">{{ $user->name }}</h5>
                <h5 class="username-talk mt-1 d-block fs-md-5">{{ '@'.$user->username }}<h5>
                <p>{!! $user->bio !!}</p>
                @if (auth()->user()->id == $user->id)   
                <a href="/user/{{ $user->username }}/edit" class="btn btn-outline-light mt-3" role="button">Set Profile</a>
               @endif
            </div>
          <p class="fs-4 mt-2">Talks</p>
            <div class="talks">
                @foreach ($user->talks as $talk)
                     @include('layouts.components.card')
                @endforeach
            </div>

           
        </div>
      @include('layouts.components.right_bar')
  </div>
@endsection

