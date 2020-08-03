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
                                <img src="assets/img/gallery/product3.png" alt="#" class="img-fluid">
                            </div>
                            <!-- <div class="single_product_img">
                                <img src="assets/img/gallery/gallery01.png" alt="#" class="img-fluid">
                            </div>
                            <div class="single_product_img">
                                <img src="assets/img/gallery/gallery1.png" alt="#" class="img-fluid">
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="single_product_text text-center">
                            <h3>3 CS<br> 3 cara cepat sukses</h3>
                            <p>
                                3 CS telah terbukti MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who
                                has the willpower to actually sit through a self-imposed MCSE training.
                            </p>
                            <p>Materi yang bakal kamu dapat :</p>
                            <ul>
                                <li>Mahir berbicara</li>
                                <li>melihat peluang</li>
                                <li>jurus jitu</li>
                            </ul>
                            <div class="card_area">
                                <div class="product_count_area">
                                    <p>Rp 500.000</p>
                                </div>
                                <div class="add_to_cart">
                                    <a href="checkout.html" class="btn_3">Beli</a>
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