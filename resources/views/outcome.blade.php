@extends('layouts.main')
@section('main')
<div class="container-fluid">
    <div class="row">
        <h2 class="mt-4">Pengeluaran</h2>
      
    </div>
   
    @if(session()->has('success'))
    <div class="row">

      <div class="col-md-5">

        <div class="alert alert-success alert-dismissible fade show m-auto mt-2 bg-success text-light " style="width: 400px" role="alert">
          {{ session('success') }} 
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
        
      </div>
    </div>
    @endif
    <div class="row justify-content-start mt-3">
      
      
      
      <div class="col-md-4 mb-md-3">
        <a href="/buku/{{ $book->key }}/pengeluaran/tambah" class="btn btn-success" style="width:">
          <svg class="bi"><use xlink:href="#add"/></svg>
          <span>Tambah</span>
        </a> 
        <a data-bs-toggle="modal" data-bs-target="#orderModal" class="btn btn-success" style="width:">
          <svg class="bi"><use xlink:href="#order"/></svg>
          <span>Urutan</span>
        </a> 
    
      </div>
   
    </div>
    
      <div class="row mb-4">    
       <div class="table-responsive small">
         <table class="table table-striped table-light table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Jenis</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($flows as $flow)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $flow->name }}</td>
                <td>{{ $flow->label }}</td>
                <td>Rp{{ number_format($flow->amount,0,',','.') }}</td>
                <td>{{ date("d-m-Y", strtotime($flow->date)) }}</td>
                <td>{{ $flow->desc }}</td>
                <td>
                  <a href="" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#updateModal{{ $flow->id }}"><svg class="bi"><use xlink:href="#update"/></svg></a> 
                  <a href="" class="btn btn-danger my-1"  data-bs-toggle="modal" data-bs-target="#deleteModal{{ $flow->id }}"><svg class="bi"><use xlink:href="#delete"/></svg></a>
                </td>
              </tr>
              <div class="modal fade" id="updateModal{{ $flow->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="/flow/{{ $flow->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                          <label for="name" class="form-label">Keterangan Pengeluaran</label>
                          <input type="text" class="form-control" id="name" aria-describedby="nama" name="name" required placeholder="Cth. Konsumsi" value="{{ $flow->name }}" required> 
                        </div>
                        <div class="mb-3">
                          <label for="amount" class="form-label">Jumlah</label>
                          <input type="number" class="form-control" id="amount" name="amount" required placeholder="Isi dengan angka, contoh: 25000" value="{{ $flow->amount }}" required>
                        </div>
                        <div class="mb-3">
                          <label for="desc" class="form-label">Deskripsi</label>
                          <input type="text" class="form-control" id="desc" name="desc" placeholder="cth. Kebutuhan makan 3x sehari" value="{{ $flow->desc }}">
                          <div id="descHelpBlock" class="form-text">
                            Tidak wajib diisi
                        </div>
                        </div>
                        <div class="mb-3">
                          <label for="date" class="form-label">Tanggal</label>
                          <input type="date" class="form-control" id="date" name="date" value="{{ $flow->date }}">
                          <div id="descHelpBlock" class="form-text">
                            Jika tidak ditentukan, maka otomatis menjadi tanggal sekarang
                        </div>
                        </div>
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <input type="hidden" name="label" value="Pengeluaran">
                        
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="deleteModal{{ $flow->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      "{{ $flow->name }}" akan dihapus, yakin?
                    </div>
                    <div class="modal-footer">
                      <form action="/flow/{{ $flow->id}}" method="post">
                        @method('delete')
                        @csrf
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus Data</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        
          </tbody>
         </table>
       </div>
     </div>
</div>
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Urutan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/buku/{{ $book->key }}/pengeluaran/urutan" method="post">
          @csrf
          <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="param" id="btnradio1" autocomplete="off" {{ $param =='date' ? 'checked':'' }} value="date">
            <label class="btn btn-outline-success" for="btnradio1">Tanggal</label>
          
            <input type="radio" class="btn-check" name="param" id="btnradio2" autocomplete="off"  {{ $param == 'amount' ? 'checked':'' }} value="amount">
            <label class="btn btn-outline-success" for="btnradio2">Jumlah</label>
          </div>
          <br>
          <div class="btn-group my-2" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="order" id="btnradio3" autocomplete="off" {{ $order == 'asc' ? 'checked':'' }} value="asc">
            <label class="btn btn-outline-success" for="btnradio3">Rendah ke Tinggi</label>
          
            <input type="radio" class="btn-check" name="order" id="btnradio4" autocomplete="off" {{ $order == 'desc' ? 'checked':'' }} value="desc">
            <label class="btn btn-outline-success" for="btnradio4">Tingggi ke rendah</label>
          </div>
          <input type="hidden" name="type" value="outcome">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Terapkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection



<!-- Modal -->
