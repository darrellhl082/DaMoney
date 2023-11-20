<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    @include('layouts.components.header_file')
  </head>
  <body>
    @include('layouts.components.svg')
    @include('layouts.components.header')
    <div class="container-fluid">
      <div class="row"> 
      @include('layouts.components.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        
          @yield('main')
      
        </main>
      </div>
    </div>
  @include('layouts.components.footer_file')  
  </body>
</html>
