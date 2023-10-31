@extends('layouts.template.app-master')

@section('context')
    Laporan Penjualan Barang
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Penjualan Barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Invoice</th>
                        <th>Pembeli</th>
                        <th>Pembayaran</th>
                        <th>Jatuh Tempo</th>
                        <th>Alamat</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr id="{{ $item->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->invoice_id }}</td>
                        <td>{{ $item->nama_pembeli }}</td>
                        <td>{{ $item->pembayaran }}</td>
                        <td>{{ $item->jatuh_tempo }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->tanggal }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>

@endsection
