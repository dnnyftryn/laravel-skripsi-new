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
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Kode Barang</label>
                                <input type="text" name="kode_barang" class="form-control" id="kode_barang"
                                    placeholder="Masukkan Kode Barang">
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                                    placeholder="Masukkan nama barang">
                            </div>
                            <div class="form-group">
                                <label for="name">Harga Jual</label>
                                <input type="text" name="harga_jual" class="form-control" id="harga_jual"
                                    placeholder="Masukkan Harga Jual">
                            </div>
                            <div class="form-group">
                                <label for="name">Harga Beli</label>
                                <input type="text" name="harga_beli" class="form-control" id="harga_beli"
                                    placeholder="Masukkan Harga Beli">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="nama_kategori" id="nama_kategori">
                                        @foreach ($kategori as $kategori)
                                            <option value="{{ $kategori->nama_kategori }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select class="form-control" name="satuan" id="">
                                        @foreach ($satuan as $satuan)
                                            <option value="{{ $satuan->satuan }}">{{ $satuan->satuan }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                            {{-- <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  </div>
                                </div>
                              </div> --}}
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
