@extends('layouts.template.app-topnav')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
@endsection

@section('context')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner"> <img src="{{asset('icon/image_2.png')}}">
                  <div class="container">
                    <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                      <div class="home_slider_title text-white bold">
                        <h2>
                          <b>
                            UUT BEEF
                          </b>
                        </h3>
                      </div>
                      <div class="home_slider_subtitle text-white">
                        <h4>
                          Tersedia berbagai macam daging segar
                        </h3>
                      </div>
                      <div class="jam_operasional_toko text-white">
                          <h5>
                            Jam operasional toko : 09:00 - 19:00
                          </h5>
                      </div>
                      <div class="jam_operasional_web text-white">
                        <h5>
                          Jam operasional web : 09:00 - 15:00
                        </h5>
                    </div>
                    <div class="button">
                      <a href="{{route('produk.index')}}">
                        <button type="button" class="btn btn-light text-black"><b>Pesan Sekarang</b></button>
                      </a>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <div>
                            <h5 style="text-align: center"><br><br><b>Sekilas Tentang Kami</b></h5>
                        </div>
                        <div>
                            <p>
                                Kami perusahaan penyedia daging sapi baik lokal maupun import serta produk olahan daging dan telah menjadi rekanan bisnis dari beberapa merchant ternama baik supermarket, hotel berbintang, resto, café,  catering dan wet market. <br>
                                Selain menjadi rekanan bisnis kami juga membuka toko retail tersendiri yang bernama Uut Beef yang beralamat di Jalan Batembat no. 17 Cirebon. <br>
                                Kami telah memperoleh Sertifikasi Halal MUI dan Sertifikasi Nomor Kontrol Veteriner (NKV) Dinas Peternakan Provinsi Jawa Barat yang menjamin produk berkualitas, higienis, halal dan terjangkau.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <img class="img-fluid" src="{{asset('icon/home-daging.jpg')}}" alt="Photo">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
