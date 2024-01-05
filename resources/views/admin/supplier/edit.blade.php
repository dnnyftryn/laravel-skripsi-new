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
                        <h3 class="card-title">Edit Barang</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('supplier.update', $supplier->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama Supplier</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="{{ $supplier->nama_supplier }}"
                                    placeholder="Masukkan nama supplier">
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Narahubung</label>
                                <input type="text" name="nama_pic" class="form-control" id="nama_pic" value="{{ $supplier->nama_pic }}"
                                    placeholder="Masukkan Nama PIC">
                            </div>
                            <div class="form-group">
                                <label for="name">Nomor HP</label>
                                <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{ $supplier->nomor_hp }}"
                                    placeholder="Masukkan Nomor HP">
                            </div>
                            <div class="form-group">
                                <label for="name">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $supplier->alamat }}"
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
