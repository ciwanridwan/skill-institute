@extends('layouts.app', ['activePage' => 'edit-webinar', 'title' => 'Edit Webinar', 'navName' => 'Edit Webinar',
'activeButton' => 'edit-webinar'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="section-image">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="row">

                <div class="card col-md-12">
                    <div class="card-header">
                        @if (Session::has('success'))
                            <p class="alert alert-success">
                                {{Session::get('success')}}
                            </p>
                            {{Session::put('success'), null}}
                        @endif
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3 class="mb-0">{{ __('Edit Webinar') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('update-webinar', $webinar->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            {{-- @include('alerts.success') --}}
                            {{-- @include('alerts.error_self_update', ['key' => 'not_allow_profile']) --}}

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('judul') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-judul">
                                        <i class="w3-xxlarge fa fa-paper-plane-o"></i>{{ __('Judul') }}
                                    </label>
                                    <input type="text" name="judul" id="input-judul"
                                        class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Judul') }}" value="{{$webinar->judul}}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'judul'])
                                </div>

                                <div class="form-group{{ $errors->has('harga') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-harga">
                                        <i class="w3-xxlarge fa fa-credit-card"></i>{{ __('harga') }}
                                    </label>
                                    <input type="number" name="harga" id="input-harga"
                                        class="form-control{{ $errors->has('harga') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Harga') }}" value="{{$webinar->harga}}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'harga'])
                                </div>

                                <div class="form-group{{ $errors->has('tipe') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-tipe">
                                        <i class="w3-xxlarge fa fa-filter"></i>{{ __('tipe') }}
                                    </label>
                                    @include('alerts.feedback', ['field' => 'tipe'])
                                </div>

                                @if ($webinar->tipe == "Online")
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="tipe"
                                            id="exampleRadios1" value="Online" checked>
                                        <span class="form-check-sign"></span>
                                        Online
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="tipe"
                                            id="exampleRadios1" value="Offline">
                                        <span class="form-check-sign"></span>
                                        Offline
                                    </label>
                                </div>    
                                @else
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="tipe"
                                            id="exampleRadios1" value="Online">
                                        <span class="form-check-sign"></span>
                                        Online
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="tipe"
                                            id="exampleRadios1" value="Offline" checked>
                                        <span class="form-check-sign"></span>
                                        Offline
                                    </label>
                                </div>    
                                @endif
                                <div class="form-group{{ $errors->has('trainer') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-trainer">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('Traineer') }}
                                    </label>
                                    <input type="text" name="trainer" id="input-trainer"
                                        class="form-control{{ $errors->has('trainer') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Trainer') }}" value="{{$webinar->trainer}}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'trainer'])
                                </div>

                                <div class="form-group{{ $errors->has('alat webinar') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-alat_webinar">
                                        <i class="w3-xxlarge fa fa-archive"></i>{{ __('alat webinar') }}
                                    </label>
                                    <input type="text" name="alat_webinar" id="input-alat_webinar"
                                        class="form-control{{ $errors->has('alat_webinar') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Alat Webinar') }}" value="{{$webinar->alat_webinar}}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'alat_webinar'])
                                </div>

                                <div class="form-group{{ $errors->has('publish') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-publish">
                                        <i class="w3-xxlarge fa fa-upload"></i>{{ __('publish') }}
                                    </label>
                                    @include('alerts.feedback', ['field' => 'publish'])
                                </div>
                                @if ($webinar->publish == "Ya")
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="publish"
                                            id="exampleRadios1" value="Ya" checked>
                                        <span class="form-check-sign"></span>
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="publish"
                                            id="exampleRadios1" value="Tidak">
                                        <span class="form-check-sign"></span>
                                        Tidak
                                    </label>
                                </div>
                                @else
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="publish"
                                            id="exampleRadios1" value="Ya">
                                        <span class="form-check-sign"></span>
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="publish"
                                            id="exampleRadios1" value="Tidak" checked>
                                        <span class="form-check-sign"></span>
                                        Tidak
                                    </label>
                                </div>
                                @endif
                                


                                <div class="form-group{{ $errors->has('jadwal') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-jadwal">
                                        <i class="w3-xxlarge fa fa-map"></i>{{ __('jadwal') }}
                                    </label>
                                    <input type="date" name="jadwal" id="input-jadwal"
                                        class="form-control{{ $errors->has('jadwal') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Jadwal') }}" value="{{$webinar->jadwal}}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'jadwal'])
                                </div>

                                <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-link">
                                        <i class="w3-xxlarge fa fa-hand-o-down"></i>{{ __('link') }}
                                    </label>
                                    <input type="url" name="link" id="input-link"
                                        class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Link') }}" value="{{$webinar->link}}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'link'])
                                </div>

                                <div class="form-group{{ $errors->has('kuota_pendaftaran') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-kuota_pendaftaran">
                                        <i class="w3-xxlarge fa fa-users"></i>{{ __('kuota pendaftaran') }}
                                    </label>
                                    <input type="number" name="kuota_pendaftaran" id="input-kuota_pendaftaran"
                                        class="form-control{{ $errors->has('kuota_pendaftaran') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Kuota Pendaftaran') }}" value="{{$webinar->kuota_pendaftaran}}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'kuota_pendaftaran'])
                                </div>

                                <div class="form-group{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-gambar">
                                        <i class="w3-xxlarge fa fa-file-photo-o"></i>{{ __('gambar') }}
                                    </label>
                                    <input type="file" name="gambar" id="input-gambar"
                                        class="form-control{{ $errors->has('gambar') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Upload Gambar Webinar') }}" value="{{$webinar->gambar}}">

                                    @include('alerts.feedback', ['field' => 'gambar'])
                                </div>

                                <div class="form-group{{ $errors->has('deskripsi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-deskripsi">
                                        <i class="w3-xxlarge fa fa-commenting-o"></i>{{ __('deskripsi') }}
                                    </label>
                                    <textarea class="form-control" placeholder="Isi Deskripsi Webinar" name="deskripsi"
                                        rows="5">{{$webinar->deskripsi}}</textarea>
                                    {{-- <input type="text" name="deskripsi" id="input-deskripsi"
                                        class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('deskripsi') }}" value=""
                                    required autofocus> --}}

                                    @include('alerts.feedback', ['field' => 'deskripsi'])
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