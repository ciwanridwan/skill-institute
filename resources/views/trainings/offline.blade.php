@extends('layouts.user')
@section('content')
<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Daftar Pelatihan Offline</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <!-- Latest Products Start -->
    <section class="popular-items latest-padding">
        <div class="container">
            <div class="row product-btn justify-content-between mb-40">
                <div class="properties__button">
                    <!--Nav Button  -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Pelatihan Baru</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pelatihan ter populer</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Pelatihan gratis </a>
                        </div>
                    </nav>
                    <!--End Nav Button  -->
                </div>
                <!-- Grid and List view -->
                <div class="grid-list-view">
                </div>
                <!-- Select items -->
                <div class="select-this">
                    <form action="#">
                        <div class="select-itms">
                            <select name="select" id="select1">
                                <option value="">6 per page</option>
                                <option value="">8 per page</option>
                                <option value="">10 per page</option>
                                <option value="">12 per page</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        @foreach ($offline as $item)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center"> 
                                <div class="popular-img">
                                    <img src="{{ asset('storage/gambar_pelatihan/'. $item->gambar) }}" alt="{{$item->nama}}">
                                    <div class="img-cap">
                                        <span>Tambah</span>
                                    </div>
                                    <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3><a href="{{route('training-details', $item->id) }}">{{$item->nama}}</a></h3>
                                    <span>RP {{ number_format($item->harga, 2, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach

                <!-- Card two -->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center">
                                <div class="popular-img">
                                    <img src="assets/img/gallery/product1.jpeg" alt="">
                                    <div class="img-cap">
                                        <span>Tambah</span>
                                    </div>
                                    <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3><a href="product_details.html">Pelatihan Bahasa Mandarin</a></h3>
                                    <span>Rp. 500.000</span>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <!-- Card three -->
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center">
                                <div class="popular-img">
                                    <img src="assets/img/gallery/product1.jpeg" alt="">
                                    <div class="img-cap">
                                        <span>Tambah</span>
                                    </div>
                                    <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3><a href="product_details.html">Pelatihan Bahasa Mandarin</a></h3>
                                    <span>Rp. 500.000</span>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- End Nav Card -->
        </div>
    </section>
    <!-- Latest Products End -->
    <!--? Shop Method Start-->
    <div class="shop-method-area">
        <div class="container">
            <div class="method-wrapper">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-package"></i>
                            <h6>Top Mentors</h6>
                            <p>Materi di Skill Institute diberikan oleh mentor-mentor yang ahli dibidangnya</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-unlock"></i>
                            <h6>Secure Payment System</h6>
                            <p>Skill Institute berkolaborasi dengan bank-bank sehingga transaksi terjamin keamanannya</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-reload"></i>
                            <h6>Secure Data System</h6>
                            <p>Data pribadi user akan dienkripsi sehingga terjamin keamanannya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Method End-->
</main>
@endsection
    
