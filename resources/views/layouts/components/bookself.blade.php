
<div class="card p-2 pt-3  p-md-3 pb-md-0 mb-1 " >
    <div class="card-header p-2 d-flex flex-row align-items-center ">
      <a href="/profile/{{ $talk->user->username }}" class="text-decoration-none d-flex flex-row align-items-center">
        <div class="avatar border-none d-inline-block "style="background-image: url('/img/{{ $talk->user->avatar }}');  border:1px solid #c7c3c3">
        </div>
        <h5 class="card-title text-light mx-2 name d-inline-block">{{ $talk->user->name }}</h5>
        <h5 class="username-talk d-inline-block fs-md-5">{{ '@'.$talk->user->username }}<h5>
      </a>
      
    </div>
  
    <div class="card-body " >
      {!! $talk->body !!}
      <img src="/img/{{ $talk->img }}" class="card-img-top my-md-3 {{ ($talk->img) ? "" : "d-none" }}">
      <span class="date d-block mt-2">{{ $talk->created_at }}<span>
      <br>
      <a class="reply-btn mt-4 d-inline-block" data-bs-toggle="collapse" href="#Reply{{ $talk->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
        <svg class="bi"><use xlink:href="#chat"/></svg>
      </a>
      <div class="del mx-2  d-inline-block">

        @if (auth()->user()->id == $talk->user->id)   
        <form action="/talks/{{ $talk->id }}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="nav-link  align-items-center gap-2  ">
            <svg class="bi"><use xlink:href="#delete"/></svg>
          </button>
        </form>
          @endif
      </div>
    </div>
    @include('layouts.components.replies')
</div>
