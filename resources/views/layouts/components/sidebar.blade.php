<div class="sidebar col-md-3 col-lg-2 p-0" style="background-color: #C4D7B2" >
  <div class="offcanvas-lg offcanvas-end "  tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel" >
    <div class="offcanvas-header" >
      <h5 class="offcanvas-title" id="sidebarMenuLabel">DaMoney</h5>
     
      <a class="btn text-white d-flex align-items-center gap-2" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"  >
        <svg class="bi"><use xlink:href="#close"/></svg>
       
      </a>
    </div>
    <div class="offcanvas-body d-md-flex flex-column mt-md-4 p-0 pt-lg-3 overflow-y-auto ps-md-3" >
      <ul class="nav flex-column mt-md-3">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2  {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/buku/{{ $book->key }}">
            <svg class="bi"><use xlink:href="#report"/></svg>
            Laporan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2  {{ Request::is('/buku/'.$book->key.'/pengeluaran') ? 'active' : '' }}" href="/buku/{{ $book->key }}/pengeluaran">
            <svg class="bi"><use xlink:href="#outcome"/></svg>
            Pengeluaran
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2  {{ Request::is('/buku/'.$book.'/pemasukan') ? 'active' : '' }}" href="/buku/{{ $book->key }}/pemasukan">
            <svg class="bi"><use xlink:href="#income"/></svg>
            Pemasukan
          </a>
        </li>
      </ul>
      <div class="sidebar-bottom">
        <hr class="my-3">
        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 disable" ">
              <svg class="bi"><use xlink:href="#profile"/></svg>
              {{  auth()->user()->username }}
            </a>
          </li>
       
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="/">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Beranda
            </a>
          </li>
        </ul>
      </div>
       
    </div>
  </div>
</div>
