<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} - DaMoney</title>
    <link rel="icon" type="image/x-icon" href="/img/chat.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 
    <link href="/css/login.css" rel="stylesheet">
    <style>
      main{
        width: 600px;
        border-radius: 25px;
        background-color: #C4D7B2;
        
      }
    </style>
  </head>
  <body class="text-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          
              
          <main class="form-login text-start p-5">
            <form action="/login" method="post">
              @csrf
              <div class="text-center">
                <h1 class="d-inline-block mb-3">DaMoney</h1>
              </div>
              @if(session()->has('loginFailed'))
              <div class="alert alert-dismissible fade show m-auto mb-3 text-center " style="width: 100%;background-color:transparent;border:1px solid black" role="alert">
                 {{ session('loginFailed') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              @if(session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show m-auto mb-3 mt-3" style="width: 100%;background-color:transparent;border:1px solid black" role="alert">
                 {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <div class="mb-3">
                <label for="username" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control border-dark bg-transparent" required id="username" name="username">
            
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control border-dark bg-transparent" required name="password" id="exampleInputPassword1">
              </div>
              <button type="submit" class="btn btn-outline-dark btn-transparent mt-3 w-100">Masuk</button>
              <p class="mt-2">Belum Terdaftar? Daftar<a href="/register" class="text-dark"> di sini</a></p>
            </form>
          </main>
       
        </div>
      </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
  </body>
</html>
