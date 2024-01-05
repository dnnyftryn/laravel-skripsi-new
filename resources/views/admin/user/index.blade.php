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
                          <h3 class="card-title">Stock Opname</h3>
                    
                          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-lg"> 
                                  Tambah Barang
                          </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <div class="table-responsive">
                            <table class="table m-0">
                              <thead>
                              <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <form action="{{ route('user.destroy', $item->id) }}" method="Post">
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
                          <!-- /.table-responsive -->
                    </div>
                    
                    @include('admin.stock-opname.modal')
                </div>
            </div>
        </div>
    </section>
@endsection
