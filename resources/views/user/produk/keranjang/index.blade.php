@extends('layouts.template.app-topnav')

@section('context')
    Produk Daging
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-stripped">
                <thead bgcolor="#EDEDED">
                    <tr>
                        <th style="width: 10px"></th>
                        <th>Produk</th>
                        <th style="width: 150px">Harga</th>
                        <th style="width: 150px">Jumlah</th>
                        <th style="width: 150px">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>
                            <form action="{{ route('keranjang_user.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                              </form>
                        </td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->harga }}</td>
                        <td style="width: 10px">{{ $item->satuan }}</td>
                        <td>Rp. @convert($item->total)</td>
                      </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
