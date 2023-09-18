@extends('layouts.template.app-topnav')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
@endsection

@section('context')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            {{-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{asset('storage/uutbeef_1.jpg')}}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('storage/uutbeef_1.jpg')}}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('storage/uutbeef_1.jpg')}}" alt="Third slide">
                    </div>
                </div>
            </div> --}}

            <div class="banner"> <img src="{{asset('storage/image_2.png')}}">
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
                  <button type="button" class="btn btn-light text-black"><b>Pesan Sekarang</b></button>
                </div>
                </div>
              </div>
            </div>

            <div class="card mt-4">
                <div class="card-header text-white mt-10 text-center" style="background-color: #3E4095;">
                    KATEGORI PRODUK
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                              <div class="card-header text-muted border-bottom-0">
                                Digital Strategist
                              </div>
                              <div class="card-body pt-0">
                                <div class="row">
                                  <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                  </div>
                                  <div class="col-5 text-center">
                                    <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="text-right">
                                  <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                  </a>
                                  <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                              <div class="card-header text-muted border-bottom-0">
                                Digital Strategist
                              </div>
                              <div class="card-body pt-0">
                                <div class="row">
                                  <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                  </div>
                                  <div class="col-5 text-center">
                                    <img src="../../dist/img/user2-160x160.jpg" alt="user-avatar" class="img-circle img-fluid">
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="text-right">
                                  <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                  </a>
                                  <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                              <div class="card-header text-muted border-bottom-0">
                                Digital Strategist
                              </div>
                              <div class="card-body pt-0">
                                <div class="row">
                                  <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                  </div>
                                  <div class="col-5 text-center">
                                    <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="text-right">
                                  <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                  </a>
                                  <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection