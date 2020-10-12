@extends('layouts.user')

{{-- @section('background-image-create')
<style>
    .button-create {
        background-image: linear-gradient(90deg, #B08EAD 0%, #4B3049 64%, #B08EAD 100%);
        background-size: 200% auto;
        padding: 30px;
        height: 400px;
        display: table;
    }
</style>
@endsection --}}

@section('content')
<main>
    <!-- Hero Area Start-->
    <!-- Hero Area End-->
    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="text-center">
                        <div class="login_part_text_iner">
                            <img src="{{ asset('storage/gambar/'. $toForm->gambar) }}" alt=""
                                width="500" height="500">
                            <br>
                            <br>
                            {{-- <h2>{{$toForm->nama}}</h2> --}}
                            <h4 style="text-align: left">Deskripsi Pelatihan</h4>
                            <p style="text-align: left"> {{$toForm->deskripsi}}</p>
                            <br>
                            <h4 style="text-align: left">Jadwal :</h4>
                            <p style="text-align: left">{{$toForm->jadwal}}</p>
                            <br>
                            <h4 style="text-align: left">Link :</h4>
                            <p style="text-align: left">{{$toForm->link}}</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Selamat Datang<br> Silahkan Registrasi Webinar</h3>

                            {{-- RESPON SUKSES --}}
                            @if (Session::has('message'))
                            <p class="alert alert-success alert-dismissible fade show" role="alert">
                                {{Session::get('message')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
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

                        <form class="row contact_form" action="{{route('store-payment-webinar', $toForm->id)}}" method="POST"
                            novalidate="novalidate">
                            @csrf
                            @method('POST')
                            @if (auth()->guard('peserta')->check())
                            <div class="col-md-12 form-group p_star">
                                <label for="">Nama Peserta</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ old('nama_lengkap', Auth()->guard('peserta')->user()->nama_lengkap) }}"
                                    placeholder="" required>
                                @if ($errors->has('nama'))
                                <div id="nama-error" class="error text-danger pl-3" for="nama" style="display: block;">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="hidden" class="form-control" id="peserta_id" name="peserta_id"
                                    value="{{ old('id', Auth()->guard('peserta')->user()->id) }}"
                                    placeholder="" required>
                                @if ($errors->has('peserta_id'))
                                <div id="peserta_id-error" class="error text-danger pl-3" for="peserta_id" style="display: block;">
                                    <strong>{{ $errors->first('peserta_id') }}</strong>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="">Email Peserta</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', Auth()->guard('peserta')->user()->email) }}" placeholder=""
                                    required>
                                @if ($errors->has('email'))
                                <div id="email-error" class="error text-danger pl-3" for="email"
                                    style="display: block;">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="">Nomor HP Peserta</label>
                                <input type="number" class="form-control" id="nomor_hp" name="nomor_hp"
                                    value="{{ old('nomor_hp', Auth()->guard('peserta')->user()->nomor_hp) }}"
                                    placeholder="" required>
                                @if ($errors->has('nomor_hp'))
                                <div id="nomor_hp-error" class="error text-danger pl-3" for="nomor_hp"
                                    style="display: block;">
                                    <strong>{{ $errors->first('nomor_hp') }}</strong>
                                </div>
                                @endif
                            </div>

                            @else
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name" name="nama" value=""
                                    placeholder="Nama Lengkap" required>
                                @if ($errors->has('nama'))
                                <div id="nama-error" class="error text-danger pl-3" for="nama" style="display: block;">
                                    <strong>{{ $errors->first('nama') }}</strong>
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
                                    placeholder="Nomor Handphone" required>
                                @if ($errors->has('nomor_hp'))
                                <div id="nomor_hp-error" class="error text-danger pl-3" for="nomor_hp"
                                    style="display: block;">
                                    <strong>{{ $errors->first('nomor_hp') }}</strong>
                                </div>
                                @endif
                            </div>
                            @endif

                            <div class="col-md-12 form-group p_star">
                                <label for="">Webinar</label>
                                <input type="text" class="form-control" id="" name="" value="{{$toForm->judul}}"
                                    placeholder="" maxlength="" required readonly>

                                <input type="hidden" class="form-control" id="webinar_id" name="webinar_id"
                                    value="{{$toForm->id}}" placeholder="" maxlength="" required readonly>
                                @if ($errors->has('webinar_id'))
                                <div id="webinar_id-error" class="error text-danger pl-3" for="webinar_id"
                                    style="display: block;">
                                    <strong>{{ $errors->first('webinar_id') }}</strong>
                                </div>
                                @endif
                            </div>


                            <div class="col-md-12 form-group p_star">
                                <label for="">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga"
                                    value="RP {{ number_format($toForm->harga, 2, ',', '.') }}" placeholder=""
                                    maxlength="" required readonly>

                                @if ($errors->has('harga'))
                                <div id="harga-error" class="error text-danger pl-3" for="harga"
                                    style="display: block;">
                                    <strong>{{ $errors->first('harga') }}</strong>
                                </div>
                                @endif
                            </div>

                            <div class="col-md-12 form-group">
                                @if (auth()->guard('peserta')->check())
                                <button type="submit" value="submit" class="btn_1">
                                    Registrasi
                                </button>
                                @else
                                <a href="{{route('login-peserta')}}" class="btn_1" type="submit">Silahkan Login Terlebih
                                    Dahulu</a>
                                @endif
                                {{-- <a class="lost_pass" href="{{route('login-peserta')}}">Sudah Punya Akun?</a> --}}
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