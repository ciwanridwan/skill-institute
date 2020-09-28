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
                            <h2>Daftar Webinar</h2>
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
                            {{-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Pelatihan gratis </a> --}}
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
                        @foreach ($webinar as $item)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center"> 
                                <div class="popular-img">
                                    <img src="{{ asset('storage/gambar/'. $item->gambar) }}" alt="{{$item->judul}}" height="350" width="300">
                                    <div class="img-cap">
                                        <a href="{{url('webinar/payment/'. $item->id)}}">
                                            <span>Tambah</span>
                                        </a>
                                    </div>
                                    <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3><a href="{{route('details-webinar', $item->id) }}">{{$item->judul}}</a></h3>
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
</main>
@endsection
    
