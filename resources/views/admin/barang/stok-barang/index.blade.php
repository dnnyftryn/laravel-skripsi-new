@extends('layouts.template.app-master')

@section('context')
    Stok Barang
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
                        <div class="card-header">
                          <h3 class="card-title">Data Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th style="width: 10px">No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Nama Kategori</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Status</th>
                                <th>Gambar</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($barang as $barang)
                                <tr id="{{ $barang->id }}">
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $barang->kode_barang }}</td>
                                  <td>{{ $barang->nama_barang }}</td>
                                  <td>{{ $barang->nama_kategori }}</td>
                                  <td>{{ $barang->jumlah }}</td>
                                  <td>{{ $barang->satuan }}</td>
                                  <td>
                                      @if ($barang->jumlah == 0)
                                          <span class="badge badge-danger">Stok Habis</span>
                                      @elseif ($barang->jumlah <= 10)
                                          <span class="badge badge-warning">Stok Hampir Habis</span>
                                      @else
                                          <span class="badge badge-success">Stok Tersedia</span>
                                      @endif
                                  </td>
                                  <td><img src="{{ asset('storage/' . $barang->image) }}"
                                      alt="{{ $barang->nama_kategori }}" style="max-width: 100px"></td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
        console.log("ready");
            $.ajax({
                type: "GET",
                url: "{{ route('kodebarang.index') }}",
                success: function(response){
                    console.log(response);

                    var kodeBarangArray = response;
                    var dataKodeBarang  = {};
                    var dataCust2       = {};

                    for (var i = 0; i < kodeBarangArray.length; i++) {
                        dataKodeBarang[kodeBarangArray[i].kode_barang] = null;
                        dataCust2[kodeBarangArray[i].kode_barang] = kodeBarangArray[i];

                    }

                    $('input#kode_barang').autocomplete({
                        data: dataKodeBarang,
                        onAutocomplete: function(val) {
                            // Callback function when value is autcompleted.
                            // console.log(val);
                            console.log(dataCust2[val].harga_jual);

                            $('#nama_barang').val(dataCust2[val].nama_barang);
                            $('#harga').val(dataCust2[val].harga_jual);
                        },
                    });
                }
            });
        });
    </script>
@endsection
