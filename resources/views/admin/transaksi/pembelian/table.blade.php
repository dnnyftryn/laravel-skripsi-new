@extends('layouts.template.app-master')
@section('context')
    Pembelian
@endsection

@section('content')

<div class="container-fluid">

  <div class="row">
    <div class="col-12">
      <h2>
        Pembelian
      </h2>
      @include('admin.transaksi.pembelian.create')
    </div>
  </div>
  
  <!-- Main content -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Keranjang</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Discount</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($keranjang as $keranjangs)
              <tr>
                <td>{{ $keranjangs->kode_barang }}</td>
                <td>{{ $keranjangs->nama_barang }}</td>
                <td>{{ $keranjangs->jumlah }}</td>
                <td>{{ $keranjangs->satuan }}</td>
                <td>{{ $keranjangs->discount }}</td>
                <td>{{ $keranjangs->total }}</td>
                <td>
                  <form action="{{ route('keranjang.destroy', ['id', $keranjangs->id]) }}" method="Post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger"><i
                              class="fas fa-trash"></i></button>
                  </form>
              </td>
            </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

  <form action="{{ route('pembelian.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="form-group col-3">
            <label for="nomor_faktur">Nomor Faktur</label>
            <input type="text" class="form-control" value="{{ $invoice }}"  id="nomor_faktur" name="nomor_faktur" @readonly(true)>
          </div>
          <div class="form-group col-3">
            <label for="tanggal">Tanggal</label>
            <input type="datetime-local" class="form-control" placeholder="Tanggal"  id="tanggal" name="tanggal">  
          </div>
          <div class="form-group col-2">
            <label for="Total">Total</label>
            <input type="text" class="form-control" value="{{ $total }}" id="total" name="total" @readonly(true)>
          </div>
          <div class="form-group col-2">
            <label for="Bayar">Bayar</label>
            <input type="text" class="form-control" id="bayar" name="bayar">
          </div>
          <div class="form-group col-2">
            <label for="Kembali">Kembali</label>
            <input type="text" class="form-control" id="kembali" name="kembali" @readonly(true)>
          </div>
        </div>
        <div class="row">
          {{-- <div class="form-group col-3">
            <label for="id_supplier">Supplier</label>
            <input type="text" class="form-control"  id="id_supplier" name="id_supplier">  
          </div> --}}
          <div class="form-group col-3">
            <label>Supplier</label>
            <select class="form-control select2" style="width: 100%;" name="nama_supplier" id="nama_supplier">
              @foreach ($supplier as $suppliers)
                <option value="{{ $suppliers->nama_supplier }}">{{ $suppliers->nama_supplier }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-3">
            <label for="alamat">alamat</label>
            <textarea class="form-control" rows="3" placeholder="Masukkan alamat" name="alamat" id="alamat"></textarea>  
          </div>
          <div class="form-group col-3">
            <label>Pembayaran</label>
              <select class="form-control" id="pembayaran" name="pembayaran">
                <option value="lunas">Lunas</option>
                <option value="kredit">Kredit</option>
              </select>
          </div>
          <div class="form-group col-3">
            <label for="hari">Hari</label>
            <input type="text" class="form-control"  id="hari" name="hari">  
          </div>
        </div>
        <div class="row">
          <div class="form-group col-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

@endsection