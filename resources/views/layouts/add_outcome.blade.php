@extends('layouts.main')
@section('main')
<div class="container-fluid">
    <div class="row">
        <h2 class="mt-3">Tambah Data</h2>
        <form action="/buku/{{ $book->key }}/pengeluaran/tambah" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Keterangan Pengeluaran</label>
              <input type="text" class="form-control" id="name" aria-describedby="nama" name="name" required placeholder="Cth. Konsumsi" required> 
            </div>
            <div class="mb-3">
              <label for="amount" class="form-label">Jumlah</label>
              <input type="number" class="form-control" id="amount" name="amount" required placeholder="Isi dengan angka, contoh: 25000" required>
            </div>
            <div class="mb-3">
              <label for="desc" class="form-label">Deskripsi</label>
              <input type="text" class="form-control" id="desc" name="desc" placeholder="Cth. Kebutuhan makan 3x sehari">
              <div id="descHelpBlock" class="form-text">
                Tidak wajib diisi
            </div>
            <div class="mb-3">
              <label for="date" class="form-label">Tanggal</label>
              <input type="date" class="form-control" id="date" name="date">
              <div id="dateHelpBlock" class="form-text">
               Jika tidak ditentukan, maka otomatis menjadi hari ini
              </div>
            </div>
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <input type="hidden" name="label" value="Pengeluaran">
            <button type="submit" class="btn btn-success">Tambah</button>
          </form>
    </div>
    
</div>
@endsection