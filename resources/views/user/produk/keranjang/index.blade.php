@extends('layouts.template.app-topnav')

@section('context')
    Keranjang Produk
@endsection

@section('content')
    <div class="container">
        @if ($count == '0')
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-stripped">
                <tbody bgcolor="#EDEDED">
                    <tr>
                        <th style="width: 10px">
                            <i class="far fa-calendar-alt"></i>
                        </th>
                        <th align="right">
                            Keranjang Anda saat ini kosong.
                        </th>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        @else
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-stripped">
                <thead bgcolor="#EDEDED">
                    <tr>
                        <th style="width: 10px" align="center"></th>
                        <th align="center">Produk</th>
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
                        {{-- <input type="text" class="form-control" placeholder="Nama Barang"  id="nama_barang" name="nama_barang">
                        {{ $item->jumlah }}
                        --}}
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->harga }}</td>
                        <td style="width: 10px">
                            {{-- <input type="text" class="form-control" placeholder="Jumlah Barang"  id="jumlah" name="jumlah" value="{{ $item->jumlah }}"> --}}
                            <input type="number" id="typeNumber" class="form-control typeNumber" name="typeNumber" value="{{ $item->jumlah }}" />
                        </td>
                        <td>Rp. @convert($item->total)</td>
                      </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td coolspan="3">
                            <button type="button" class="btn btn-block btn-default">Perbarui</button>
                        </td>
                    </tr>
                </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        @endif

        <div class="card col-6">
            <div class="card-header">
                <h3 class="card-title">Total Keranjang Keranjang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <table class="table table-sm">
                <tbody>
                    <tr>
                        <td>
                            Subtotal
                        </td>
                        <td>
                            Rp. @convert($sub_total)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Total</b>
                        </td>
                        <td>
                            <b>Rp. @convert($sub_total)</b>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <td>
                        <form action="{{ route('keranjang.checkout', $item->id) }}" method="POST">
                            @csrf
                            @method('GET')
                        {{-- <a href="{{ route(keranjang.checkout)}}" class="btn btn-block btn-primary">Lanjutkan Checkout</a> --}}
                        <button type="submit" class="btn btn-block btn-primary">Lanjutkan Checkout</button>
                        </form>
                    </td>
                </tfoot>
            </table>
            </div>
            <!-- /.card-body -->
        </div>

    </div>
@endsection
