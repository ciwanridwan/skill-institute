@extends('layouts.user')
@section('content')
    <main>
        <!-- Hero Area Start-->

        <!-- Hero Area End-->
        <!--================Single Product Area =================-->
        <div class="product_image_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="product_img_slide owl-carousel">
                            <div class="single_product_img">
                                <img src="{{ asset ('storage/gambar/'. $details->gambar)}}" alt="#" class="img-fluid" style="width: 500px; height: 500px;">
                            </div>                           
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="single_product_text text-center">
                            <h3>{{$details->nama}}</h3>
                            <p>
                                {{$details->deskripsi}}
                            </p>
                            <p>Materi yang bakal kamu dapat :</p>
                            <ul>
                                <li>{{$details->kemampuan_dasar_peserta}}</li>
                                <li>{{$details->kemampuan_teknis_peserta}}</li>
                            </ul>
                            <div class="card_area">
                                <div class="product_count_area">
                                    <p> RP {{ number_format($details->harga, 2, ',', '.') }}</p>
                                </div>
                                <div class="add_to_cart">
                                    <a href="{{route('payment-webinar', $details->id)}}" class="btn_3">Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Single Product Area =================-->
        <!-- subscribe part here -->
        <section class="subscribe_part section_padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="subscribe_part_content">
                            <h2>Dapatkan Informasi Kelas terbaru</h2>
                            <div class="subscribe_form">
                                <input type="email" placeholder="Ketik Email Kamu">
                                <a href="#" class="btn_1">Subscribe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- subscribe part end -->
    </main>
    @endsection