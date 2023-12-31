@extends('layouts.template.app-master')

@section('context')
    Barang
@endsection

@section('content')
    <section class="content">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show " id="notifDiv" role="alert">
          <strong>{{ $message }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="container-fluid">
            <div class="row">
            </div>
            <div class="row">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Barang Masuk</h3>
                            <button type="button" class="btn btn-primary float-right"> 
                                <a href="{{ route('barang-masuk.create') }}" class="text-white">
                                    Tambah Barang
                                </a>
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Nama Kategori</th>
                                        <th>Jumlah Barang</th>
                                        <th>Satuan</th>
                                        <th>Supplier</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang_masuk as $barang)
                                    <tr id="{{ $barang->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $barang->kode_barang }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->nama_kategori }}</td>
                                        <td>{{ $barang->jumlah }}</td>
                                        <td>{{ $barang->satuan }}</td>
                                        <td>{{ $barang->nama_supplier }}</td>
                                        <td>{{ $barang->keterangan }}</td>
                                        <td>{{ $barang->tanggal_masuk }}</td>
                                        <td>
                                            <form action="{{route('barang-masuk.destroy', $barang->id)}}" method="Post">
                                                <a class="btn btn-warning" href="{{route('barang-masuk.edit', $barang->id)}}"><i class="fas fa-pen"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
@endsection
