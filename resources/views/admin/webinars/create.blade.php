@extends('layouts.app', ['activePage' => 'create-webinar', 'title' => 'Create Webinar', 'navName' => 'Create Webinar',
'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="section-image">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="row">

                <div class="card col-md-12">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3 class="mb-0">{{ __('Tambah Webinar') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            @include('alerts.success')
                            @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('judul') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-judul">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('Judul') }}
                                    </label>
                                    <input type="text" name="judul" id="input-judul"
                                        class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Judul') }}" value=""
                                        required autofocus>

                                    @include('alerts.feedback', ['field' => 'judul'])
                                </div>

                                <div class="form-group{{ $errors->has('harga') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-harga">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('harga') }}
                                    </label>
                                    <input type="text" name="harga" id="input-harga"
                                        class="form-control{{ $errors->has('harga') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('harga') }}" value=""
                                        required autofocus>

                                    @include('alerts.feedback', ['field' => 'harga'])
                                </div>

                                <div class="form-group{{ $errors->has('tipe') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-tipe">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('tipe') }}
                                    </label>
                                    <input type="text" name="tipe" id="input-tipe"
                                        class="form-control{{ $errors->has('tipe') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('tipe') }}" value=""
                                        required autofocus>

                                    @include('alerts.feedback', ['field' => 'tipe'])
                                </div>

                                <div class="form-group{{ $errors->has('traineer') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-traineer">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('traineer') }}
                                    </label>
                                    <input type="text" name="traineer" id="input-traineer"
                                        class="form-control{{ $errors->has('traineer') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('traineer') }}" value=""
                                        required autofocus>

                                    @include('alerts.feedback', ['field' => 'traineer'])
                                </div>

                                <div class="form-group{{ $errors->has('deskripsi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-deskripsi">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('deskripsi') }}
                                    </label>
                                    <input type="text" name="deskripsi" id="input-deskripsi"
                                        class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('deskripsi') }}" value=""
                                        required autofocus>

                                    @include('alerts.feedback', ['field' => 'deskripsi'])
                                </div>

                                <div class="form-group{{ $errors->has('alat_webinar') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-alat_webinar">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('alat_webinar') }}
                                    </label>
                                    <input type="text" name="alat_webinar" id="input-alat_webinar"
                                        class="form-control{{ $errors->has('alat_webinar') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('alat_webinar') }}" value=""
                                        required autofocus>

                                    @include('alerts.feedback', ['field' => 'alat_webinar'])
                                </div>

                                <div class="form-group{{ $errors->has('publish') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-publish">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('publish') }}
                                    </label>
                                    <input type="text" name="publish" id="input-publish"
                                        class="form-control{{ $errors->has('publish') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('publish') }}" value=""
                                        required autofocus>

                                    @include('alerts.feedback', ['field' => 'publish'])
                                </div>

                                <div class="form-group{{ $errors->has('jadwal') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-jadwal">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('jadwal') }}
                                    </label>
                                    <input type="text" name="jadwal" id="input-jadwal"
                                        class="form-control{{ $errors->has('jadwal') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('jadwal') }}" value=""
                                        required autofocus>

                                    @include('alerts.feedback', ['field' => 'jadwal'])
                                </div>

                                <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-link">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('link') }}
                                    </label>
                                    <input type="text" name="link" id="input-link"
                                        class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('link') }}" value=""
                                        required autofocus>

                                    @include('alerts.feedback', ['field' => 'link'])
                                </div>

                                <div class="form-group{{ $errors->has('kuota_pendaftaran') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-kuota_pendaftaran">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('kuota_pendaftaran') }}
                                    </label>
                                    <input type="text" name="kuota_pendaftaran" id="input-kuota_pendaftaran"
                                        class="form-control{{ $errors->has('kuota_pendaftaran') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('kuota_pendaftaran') }}" value=""
                                        required autofocus>

                                    @include('alerts.feedback', ['field' => 'kuota_pendaftaran'])
                                </div>
                                
                                <div class="form-group{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-gambar">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('gambar') }}
                                    </label>
                                    <input type="text" name="gambar" id="input-gambar"
                                        class="form-control{{ $errors->has('gambar') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('gambar') }}" value=""
                                        required autofocus>

                                    @include('alerts.feedback', ['field' => 'gambar'])
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email"><i
                                            class="w3-xxlarge fa fa-envelope-o"></i>{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Email') }}"
                                        value="{{ old('email', auth()->user()->email) }}" required>

                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection