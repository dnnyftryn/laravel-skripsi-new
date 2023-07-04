@extends('layouts.template.app-master')

@section('context')
    Barang
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    @include('admin.stock-opname.table')
                </div>
            </div>
        </div>
    </section>
@endsection
