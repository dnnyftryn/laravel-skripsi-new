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
                        <h3 class="card-title">Tambah kategori Barang</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Kategori Barang</label>
                                <input type="text" name="kode_barang" class="form-control" id="kode_barang"
                                    placeholder="Masukkan Kode Barang">
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
