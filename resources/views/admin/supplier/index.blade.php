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
                <div class="row">
                    <div class="card">
                        <div class="card-header border-transparent">
                          <h3 class="card-title">Daftar Supplier</h3>
                    
                          <button type="button" class="btn btn-primary float-right""> 
                            <a href="{{ route('supplier.create') }}" class="text-white">
                                Tambah Supplier
                            </a>
                          </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <div class="table-responsive">
                            <table class="table m-0">
                              <thead>
                              <tr>
                                <th>ID</th>
                                <th>Nama Supplier</th>
                                <th>Nama Narahubung</th>
                                <th>Nomor HP</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach ($supplier as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama_supplier }}</td>
                                    <td>{{ $item->nama_pic }}</td>
                                    <td>{{ $item->nomor_hp }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>
                                        <form action="{{ route('supplier.destroy', $item->id) }}" method="Post">
                                          @csrf
                                          @method('DELETE')
                                          <a class="btn btn-warning" href="{{route('supplier.edit', $item->id)}}"><i class="fas fa-pen"></i></a>
                                          <button type="submit" class="btn btn-danger"><i
                                                  class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                              </tbody>
                            </table>
                          </div>
                          <!-- /.table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
