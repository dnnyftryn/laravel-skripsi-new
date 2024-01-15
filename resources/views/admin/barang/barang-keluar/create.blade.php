@extends('layouts.template.app-master')

@section('context')
    Input Barang
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Regist User -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Barang</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('barang-keluar.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Kode Barang</label>
                                <select class="form-control" name="kode_barang" id="">
                                    @foreach ($barang as $kode_barang)
                                        <option value="{{ $kode_barang->kode_barang }}">{{ $kode_barang->kode_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                                    placeholder="Masukkan nama barang">
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
                                <label for="name">Jumlah Barang</label>
                                <input type="text" name="jumlah" class="form-control" id="jumlah"
                                    placeholder="Masukkan Jumlah barang">
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
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <select class="form-control" name="nama_supplier" id="nama_supplier">
                                        @foreach ($supplier as $supplier)
                                            <option value="{{ $supplier->nama_supplier }}">{{ $supplier->nama_supplier }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" id="keterangan"
                                    placeholder="Masukkan keterangan">
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
