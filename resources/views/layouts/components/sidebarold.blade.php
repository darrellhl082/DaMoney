
<div class="sidebar col-md-3 col-lg-2 p-0 " style="background-color:black;">
  <div class="offcanvas-lg offcanvas-end " style="background-color:black;" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel" >
    <div class="offcanvas-header" style="background-color:black;">
      <h5 class="offcanvas-title" id="sidebarMenuLabel">InTalk</h5>
     
      <a class="btn text-white d-flex align-items-center gap-2" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"  >
        <svg class="bi"><use xlink:href="#close"/></svg>
       
      </a>
    </div>
    <div class="offcanvas-body d-md-flex flex-column mt-md-4 p-0 pt-lg-3 overflow-y-auto ps-md-3" >
      <ul class="nav flex-column" >
        <li class="nav-item mb-md-2 mb-sm-1" >
          <a class="nav-link btn btn-outline-dark d-flex mb-sm-1 align-items-center gap-2  {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
            <svg class="bi"><use xlink:href="#house-fill"/></svg>
            Home
          </a>
        </li>       
        <li class="nav-item mb-md-2 text-black mb-sm-1">
          <a class="nav-link btn btn-outline-dark d-flex mb-sm-1 align-items-center gap-2  {{ Request::is('/explore*') ? 'active' : '' }}" href="/explore">
            <svg class="bi"><use xlink:href="#compass"/></svg>
           Explore
          </a>
        </li>       
        <li class="nav-item mb-md-2 text-black mb-sm-1">
          <a class="nav-link btn btn-outline-dark d-flex mb-sm-1align-items-center gap-2  {{ Request::is('talks', 'talks/*') ? 'active' : 'll' }}" href="/talks/create">
            <svg class="bi"><use xlink:href="#talk"/></svg>
          Talk
          </a>
        </li>      
        @auth
        <li class="nav-item mb-md-2 text-black mb-sm-1">
          <a class="nav-link btn btn-outline-dark d-flex mb-sm-1 align-items-center gap-2   {{ Request::is('profile', 'profile/'.auth()->user()->username) ? 'active' : '' }}" href="{{  Auth::check() ? "/profile/".auth()->user()->username : "/login"}}">
            <svg class="bi"><use xlink:href="#profile"/></svg>
            Profile
          </a>
        </li>  
        @endauth
        <li class="nav-item mb-sm-1">
          @auth
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="nav-link d-flex align-items-center gap-2 btn btn-outline-dark">
              <svg class="bi"><use xlink:href="#logout"/></svg>
             Logout
            </button>
          </form>
           @else
           <a class="nav-link d-flex align-items-center gap-2 btn btn-outline-dark" href="/login">
            <svg class="bi"><use xlink:href="#login"/></svg>
            Login
          </a>
          @endauth
        
        </li>     
      
      </ul>
    </div>
  </div>
</div>
