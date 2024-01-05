@extends('layouts.template.app-master')
@section('context')
    Dashboard
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3> {{ $supplier }} </h3>
                            <p>Data Supplier</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <a href="{{ route('supplier.index') }}" class="small-box-footer">
                            More info 
                        <i class="fas fa-arrow-circle-right"></i>
                    
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3> {{ $barang_masuk }} </h3>
                            <p>Barang Masuk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cube"></i>
                        </div>
                        <a href="{{ route('barang-masuk.index') }}" class="small-box-footer">
                            More info     
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3> {{ $barang_keluar }} </h3>
                            <p>Barang Keluar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cube"></i>
                        </div>
                        <a href="{{ route('barang-keluar.index') }}" class="small-box-footer">
                            More info 
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $users }}</h3>
                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-person"></i>
                        </div>
                        <a href="{{ route('user.index') }}" class="small-box-footer">
                            More info 
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col">
                        @include('admin.table_pembelian')
                        <!-- /.card -->
                        @include('admin.table_penjualan')
                        <!-- /.card -->
                    </div>
                  </div>
                </div>
            </section>

            {{-- <div class="container">
                <div class="row">
                  <div class="col-lg-6">
                    @include('admin.table_pembelian')
                  </div>
                  <div class="col-lg-6">
                    @include('admin.table_penjualan')
                  </div>
                </div>
              </div> --}}

            {{-- <div class="row">
                <div class="col-sm">
                    @include('admin.table')
                </div>
                <div class="col-sm">
                    @include('admin.table')
                </div>
            </div> --}}
            
        </div>


    </section>
@endsection
