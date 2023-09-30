@extends('layouts.template.app-topnav')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
@endsection

@section('context')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <img src="{{asset('icon/cara_pemesanan.png')}}" class="img-fluid" alt="Responsive image">
    </div>
@endsection
