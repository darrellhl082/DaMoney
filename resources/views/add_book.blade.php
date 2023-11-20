<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Atur Keuanganmu!">
    <title>{{ $title }} · DaMoney</title>
    <link rel="icon" type="image/x-icon" href="/img/chat.png">
    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/index.css">
    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background-color: #E1ECC8;
        }
        
        .create-book{
          background-color: #C4D7B2;
         border-radius: 25px;
        }
        .icons img{
            width: 120px;
        }
        .menu-mobile{
            background-color: #C4D7B2;   
        }
        @media (min-width: 768px) {
            .icons{
                min-height: 55vh;
            }
            
        }
    </style>   

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    {{-- scripts --}}
   

    </head>
    <body>
        @include('layouts.components.svg')
        <nav class="navbar navbar-home navbar-expand-lg">
            <div class="container">
              <a class="navbar-brand" href="#">DaMoney</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"  >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Beranda</a>
                  </li>
                
                  <li class="nav-item mb-sm-1">
                    @auth
                    <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="nav-link d-flex align-items-center gap-2 btn btn-transparent">
                       Keluar
                      </button>
                    </form>
                    @endauth
                  
                  </li>     
                </ul>
              </div>
            </div>
        </nav>
          
          <div class="offcanvas menu-mobile offcanvas-lg offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasExampleLabel">DaMoney</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <div>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="/">Beranda</a>
                    </li>
                  
                    <li class="nav-item mb-sm-1">
                      @auth
                      <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link d-flex align-items-center gap-2 btn btn-transparent">
                         Keluar
                        </button>
                      </form>
                      @endauth
                    
                    </li>     
                  </ul>
              </div>
             
            </div>
          </div>
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-5 mt-4">
                    <h2>Tambah Buku Catatan Keuangan Baru</h2>
                </div>
            </div>
            <div class="row icons justify-content-start align-items-center">
                <div class="col-md-8 my-4">
                  <main class="create-book text-start p-5">
                    <form action="/books" method="post">
                      @csrf
                      @if(session()->has('loginFailed'))
                      <div class="alert alert-dismissible fade show m-auto mb-3 text-center " style="width: 370px;background-color:black;color:white;border:1px solid white" role="alert">
                         {{ session('loginFailed') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif
                      @if(session()->has('success'))
                      <div class="alert alert-success alert-dismissible fade show m-auto mb-3 mt-3" style="width: 370px;background-color:black;color:white;border:1px solid white" role="alert">
                         {{ session('success') }}
                          <button type="button" class="btn-close" style="color: white" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif
                      <div class="mb-3"> 
                        <label for="name" class="form-label">Nama Buku Catatan</label>
                        <input type="text" class="form-control bg-transparent border-dark" required id="name" name="name">
                    
                      </div>
                      <button type="submit" class="btn btn-outline-dark btn-transparent mt-3">Buat</button>
                     
                    </form>
                  </main>
                </div>
            </div>
        </div>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="/js/dashboard.js"></script>
        <script src="/js/script.js"></script>   
    </body>
</html>
