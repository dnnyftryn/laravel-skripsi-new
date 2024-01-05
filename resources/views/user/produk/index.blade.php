@extends('layouts.template.app-topnav')

@section('context')
    Produk Daging
@endsection

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show " id="notifDiv" role="alert">
          <strong>{{ $message }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($data as $item)
            <div class="col mb-6">
                <div class="card" style="width: 18rem;">
                    @if ($item->image)
                    <img src="{{ url('storage/'.$item->image) }}" class="card-img-top center">
                    @else
                    <img src="{{ url('icon/no-image.png') }}" class="card-img-top center" alt="...">
                    @endif
                    <div class="card-body">
                        <p class="card-text">
                            <a href="{{route('produk.show', $item->kode_barang)}}" class="link-secondary">
                                {{$item->nama_barang}}
                            </a>
                            <br>
                            Stok Tersedia : {{$item->jumlah}}
                        </p>
                        <b>Rp. @convert($item->harga_jual)</b>
                    </div>
                </div>
            </div>
            @endforeach
            <br>
          </div>
          {{ $data->links() }}
    </div>
@endsection
