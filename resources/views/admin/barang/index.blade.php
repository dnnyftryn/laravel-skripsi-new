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
        @elseif ($message = Session::get('failed'))
        <div class="alert alert-danger alert-dismissible fade show " id="notifDiv" role="alert">
          <strong>{{ $message }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> 
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    @include('admin.barang.detail-barang.detail')
                </div>
                <div class="row">
                    @include('admin.barang.detail-barang.table')
                </div>
            </div>
        </div>
    </section>
@endsection
