@extends('layouts.template.app-master')

@section('context')
    Input Barang
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Regist User -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Barang</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('barang.update',  $barang->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Kode Barang</label>
                                <input type="text" name="kode_barang" class="form-control" id="kode_barang"
                                    placeholder="Masukkan Kode Barang" value="{{ $barang->kode_barang }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                                    placeholder="Masukkan nama barang" value="{{ $barang->nama_barang }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Jumlah Barang</label>
                                <input type="text" name="jumlah" class="form-control" id="jumlah"
                                    placeholder="Masukkan jumlah barang" value="{{ $barang->jumlah }}">
                            </div>
                            <div class="mb-3">
                              <label for="image" class="form-label">Gambar Barang</label>
                              <img class="img-preview img-fluid mb-3 col-sm-5">
                              <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                                  name="image" onchange="previewImage()">
                              @error('image')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>

    </section>
    <!-- /.content -->

@endsection
