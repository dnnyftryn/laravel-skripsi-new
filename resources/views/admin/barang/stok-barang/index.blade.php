@extends('layouts.template.app-master')

@section('context')
    Stok Barang
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Data Barang</h3>
                          <button type="button" class="btn btn-primary float-right"> 
                            <a href="{{ route('barang.create') }}" class="text-white">
                                Tambah Barang
                            </a>
                          </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th style="width: 10px">No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Nama Kategori</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Status</th>
                                <th>Gambar</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($barang as $barang)
                                <tr id="{{ $barang->id }}">
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $barang->kode_barang }}</td>
                                  <td>{{ $barang->nama_barang }}</td>
                                  <td>{{ $barang->nama_kategori }}</td>
                                  <td>{{ $barang->jumlah }}</td>
                                  <td>{{ $barang->satuan }}</td>
                                  <td> 
                                      @if ($barang->jumlah == 0)
                                          <span class="badge badge-danger">Stok Habis</span>
                                      @elseif ($barang->jumlah <= 10)
                                          <span class="badge badge-warning">Stok Hampir Habis</span>
                                      @else
                                          <span class="badge badge-success">Stok Tersedia</span>
                                      @endif
                                  </td>
                                  <td><img src="{{ asset('storage/' . $barang->image) }}"
                                      alt="{{ $barang->nama_kategori }}" style="max-width: 100px"></td>
                                  <td>
                                      <form action="" method="Post">
                                          <a class="btn btn-warning" href=""><i class="fas fa-pen"></i></a>
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
                </div>
            </div>
        </div>
    </section>
@endsection