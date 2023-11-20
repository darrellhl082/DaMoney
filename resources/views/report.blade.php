@extends('layouts.main')
@section('main')
<div class="container-fluid">
    <div class="row mt-4">
       <h2 class="">Laporan Keuangan</h2>
       <p>Periode: {{ ($start) ? date("d-m-Y", strtotime($start)) : '' }} Sampai {{ date("d-m-Y", strtotime($end)) }}</p>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">
        <a data-bs-toggle="modal" data-bs-target="#dateModal" class="btn btn-success">
          <svg class="bi"><use xlink:href="#date"/></svg>
          <span>Periode</span>
        </a> 
        
      </div>
      
    </div>
    <div class="row mb-3">
      @php
          $income = 0;
          $outcome = 0;
          foreach ($flows as $flow => $value) {
            if($value->label == "Pengeluaran"){
              $outcome+=$value->amount;
            }
            if($value->label == "Pemasukan"){
              $income+=$value->amount;
            }
          }
      @endphp
      <div class="col-md-6">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
               <th scope="col">Keterangan</th>
               <th scope="col">Jumlah</th>               
            </tr>
          </thead>
          <tbody>
              <tr>
                <td>1. </td>
                <td>Jumlah Pengeluaran</td>
                <td>Rp{{ number_format($outcome,0,',','.') }}</td>
              </tr>
              <tr>
                <td>2. </td>
                <td>Jumlah Pemasukan</td>
                <td>Rp{{ number_format($income,0,',','.') }}</td>
              </tr>
              <tr>
                <td>3. </td>
                <td>Total</td>
                <td>Rp{{ number_format($income-$outcome,0,',','.') }}</td>
              </tr>
            </tbody>
          </table>
      </div>
      <div class="row my-4">
        <p>Data Arus Keluar Masuk Kas</p>
         <div class="table-responsive small">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">No.</th>
                 <th scope="col">Keterangan</th>
                 <th scope="col">Jenis</th>
                 <th scope="col">Jumlah</th>
                 <th scope="col">Tanggal</th>
                 <th scope="col">Deskripsi</th>                
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
                </tr>        
              @endforeach
              </tbody>
            </table>  
      </div>
     
        </div>
      </div>
</div>
<div class="modal fade" id="dateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Periode</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/laporan/{{ $book->key }}/periode" method="post">
          @csrf
          <div class="mb-3">
            <label for="start" class="form-label">Awal</label>
            <input type="date" class="form-control" id="start" name="start" value="{{ $start }}">
          </div>
          <div class="mb-3">
            <label for="end" class="form-label">Akhir</label>
            <input type="date" class="form-control" id="end" name="end" value="{{ $end }}">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Terapkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
