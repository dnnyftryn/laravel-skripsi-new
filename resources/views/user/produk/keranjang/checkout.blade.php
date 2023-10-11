@extends('layouts.template.app-topnav')

@section('context')
    Detail Pembayaran
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Regist User -->
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail Pesanan</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('send.wa') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nama_depan">Nama Depan</label>
                                        <input type="text" name="nama_depan" class="form-control" id="nama_depan" placeholder="Masukkan Nama Depan">
        
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nama_belakang">Nama Belakang</label>
                                        <input type="text" name="nama_belakang" class="form-control" id="nama_belakang" placeholder="Masukkan Nama Belakang">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Nomor Member (opsional)</label>
                                    <input type="text" name="nomor_member" class="form-control" id="nomor_member" placeholder="Masukkan Nomor Member">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="negara">Negara/ Wilayah</label>
                                <select class="form-control" name="negara" id="negara">
                                    <option value="Indonesia">Indonesia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Alamat/ Jalan</label>
                                    <input type="text" name="jalan" class="form-control" id="jalan" placeholder="Nomor Rumah dan Nama Jalan">
                                    <br>
                                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Apartemen, Suit, unit, dll (opsional)">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Kota</label>
                                    <input type="text" name="kota" class="form-control" id="kota" placeholder="Masukkan Nama Kota">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <input type="text" name="provinsi" class="form-control" id="provinsi" placeholder="Masukkan Nama Provinsi">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input type="text" name="kode_pos" class="form-control" id="kode_pos" placeholder="Masukkan Kode Pos">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="text" name="Telepon" class="form-control" id="Telepon" placeholder="Masukkan Nomor Telepon">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Alamat email</label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="Masukkan Alamat Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pengambilan Pesanan</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" name="tanggal_ambil" id="tanggal_ambil" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($data as $item)
                                <input type="text" name="nama_barang" class="form-control" id="nama_barang" value="{{$item->nama_barang}}" hidden>
                                <input type="text" name="jumlah" class="form-control" id="jumlah" value="{{$item->jumlah}}" hidden>
                                <input type="text" name="total" class="form-control" id="total" value="Rp. @convert($item->total)" hidden>
                            @endforeach
                                <input type="text" name="subtotal" class="form-control" id="subtotal" value="Rp. @convert($sub_total)" hidden>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-9">
                                <h3 class="card-title">Produk</h3>
                            </div>
                            <div class="col-3">
                                <h3 class="card-title">Subtotal</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($data as $item)
                                <div class="col-6">
                                    <a>{{$item->nama_barang}}</a>
                                </div>
                                <div class="col-3">
                                    <a>x{{$item->jumlah}}</a>
                                </div>
                                <div class="col-3">
                                    <a>Rp. @convert($item->total)</a>
                                </div>
                            @endforeach
                            <br>
                            <div class="dropdown-divider"></div>
                            <br>
                            <div class="col-9">
                                <a>Subtotal</a>
                            </div>
                            <div class="col-3">
                                {{-- <a>Rp. @convert($item->total)</a> --}}
                                <a>Rp. @convert($sub_total)</a>
                            </div>
                            <br>
                            <div class="dropdown-divider"></div>
                            <br>
                            <div class="col-9">
                                <a>Total</a>
                            </div>
                            <div class="col-3">
                                <a>Rp. @convert($sub_total)</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h3 class="card-title">Pemesanan</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <button class="btn btn-danger">Buat Pesanan</button>
                        </div>
                        <br>
                        <div class="row">
                            <a href=""></a>
                            <button type="button" class="btn btn-success btn-block" data-toggle="dropdown"><i class="fa-brands fa-whatsapp"></i> Pesan Via WhatsApp</button>
                            <div class="dropdown-menu btn-block" role="menu">
                                <a class="dropdown-item" href="https://wa.me/6282119232351?text=Hai%20Admin%20!%0ANama%20Depan%20:%0ANama%20Belakang%20:%0ANo.%20Member%20:%0ANegara/%20Wilayah%20:%0AAlamat%20:%20">Admin 1</a>
                                <a class="dropdown-item" href="https://wa.me/6282119232351?text=Hai%20Admin%20!%0ANama%20Depan%20:%0ANama%20Belakang%20:%0ANo.%20Member%20:%0ANegara/%20Wilayah%20:%0AAlamat%20:%20">Admin 2</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection
