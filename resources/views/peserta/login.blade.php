@extends('layouts.user')

@section('content')
<main>
    <!-- Hero Area Start-->
    <!-- Hero Area End-->
    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Yuk Lanjut Ke Pembelajaran ?</h2>
                            <p>Yuk tambah pengalaman dan skill anda bersama kami di Skill Institute</p>
                            <a href="{{route('register-peserta')}}" class="btn_3">Buat Akun Baru</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Selamat Datang<br> Silahkan Login Terlebih dahulu !</h3>
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{Session::get('error')}}
                                    {{Session::put('error', null)}}
                                 </div>                            
                            @endif

                            <form class="row contact_form" action="{{route('store-login')}}" method="post" novalidate="novalidate">
                                @csrf
                                @method('post')
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="email" name="email" value=""
                                        placeholder="Email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Ingat Saya</label>
                                    </div>
                                    <button type="submit" value="" class="btn_3">
                                        Masuk
                                    </button>
                                    <a class="lost_pass" href="#">Lupa Password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
</main>
@endsection