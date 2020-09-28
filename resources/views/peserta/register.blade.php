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
                            <a href="{{route('login-peserta')}}" class="btn_3">Sudah Punya Akun ?</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Selamat Datang<br> Silahkan Daftar Akun Terlebih Dahulu</h3>

                            {{-- RESPON SUKSES --}}
                            @if (Session::has('message'))
                            <p class="alert alert-success">
                                {{Session::get('message')}}
                            </p>
                            {{Session::put('message', null)}}
                            @endif
                        
                        {{-- RESPON ERROR --}}
                        {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif --}}

                        <form class="row contact_form" action="{{route('store-register')}}" method="post"
                            novalidate="novalidate">
                            @csrf
                            @method('post')
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name" name="nama_lengkap" value=""
                                    placeholder="Nama Lengkap" required>
                                    @if ($errors->has('nama_lengkap'))
                                    <div id="nama_lengkap-error" class="error text-danger pl-3" for="nama_lengkap"
                                        style="display: block;">
                                        <strong>{{ $errors->first('nama_lengkap') }}</strong>
                                    </div>
                                    @endif
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="email" class="form-control" id="email" name="email" value=""
                                    placeholder="Email" required>
                                @if ($errors->has('email'))
                                <div id="email-error" class="error text-danger pl-3" for="email"
                                    style="display: block;">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" value=""
                                    placeholder="Nomor Handphone" maxlength="" required>
                                    @if ($errors->has('nomor_hp'))
                                    <div id="nomor_hp-error" class="error text-danger pl-3" for="nomor_hp"
                                        style="display: block;">
                                        <strong>{{ $errors->first('nomor_hp') }}</strong>
                                    </div>
                                    @endif
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password" value=""
                                    placeholder="Password" required>
                                    @if ($errors->has('password'))
                                    <div id="password-error" class="error text-danger pl-3" for="password"
                                        style="display: block;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                    @endif
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" value="" placeholder="Konfirmasi Password" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn_3">
                                    Daftar
                                </button>
                                <a class="lost_pass" href="{{route('login-peserta')}}">Sudah Punya Akun?</a>
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