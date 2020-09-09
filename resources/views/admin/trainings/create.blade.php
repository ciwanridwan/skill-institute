@extends('layouts.app', ['activePage' => 'create-training', 'title' => 'Create Training', 'navName' => 'Tambah
Pelatihan',
'activeButton' => 'training'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="section-image">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="row">

                <div class="card col-md-12">
                    <div class="card-header">
                        @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        {{Session::put('success'), }}
                        @endif
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3 class="mb-0">{{ __('Tambah Pelatihan') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('store-training') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            {{-- @include('alerts.success') --}}
                            {{-- @include('alerts.error_self_update', ['key' => 'not_allow_profile']) --}}

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nama">
                                        <i class="w3-xxlarge fa fa-paper-plane-o"></i>{{ __('nama pelatihan') }}
                                    </label>
                                    <input type="text" name="nama" id="input-nama"
                                        class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Nama Pelatihan') }}" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'nama'])
                                </div>

                                <div class="form-group{{ $errors->has('harga') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-harga">
                                        <i class="w3-xxlarge fa fa-credit-card"></i>{{ __('harga') }}
                                    </label>
                                    <input type="number" name="harga" id="input-harga"
                                        class="form-control{{ $errors->has('harga') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Harga') }}" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'harga'])
                                </div>

                                <div class="form-group{{ $errors->has('tipe') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-tipe">
                                        <i class="w3-xxlarge fa fa-filter"></i>{{ __('tipe') }}
                                    </label>
                                    @include('alerts.feedback', ['field' => 'tipe'])
                                </div>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="tipe" id="exampleRadios1"
                                            value="Offline">
                                        <span class="form-check-sign"></span>
                                        Offline
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="tipe" id="exampleRadios1"
                                            value="Online">
                                        <span class="form-check-sign"></span>
                                        Online
                                    </label>
                                </div>

                                <div class="form-group{{ $errors->has('trainer') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-trainer">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('Trainer') }}
                                    </label>
                                    <input type="text" name="trainer" id="input-trainer"
                                        class="form-control{{ $errors->has('trainer') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Trainer') }}" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'trainer'])
                                </div>

                                <div class="form-group{{ $errors->has('alat_training') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-alat_training">
                                        <i class="w3-xxlarge fa fa-archive"></i>{{ __('alat training') }}
                                    </label>
                                    <input type="text" name="alat_training" id="input-alat_training"
                                        class="form-control{{ $errors->has('alat_training') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Alat Training') }}" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'alat_training'])
                                </div>

                                <div class="form-group{{ $errors->has('publish') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-publish">
                                        <i class="w3-xxlarge fa fa-upload"></i>{{ __('publish') }}
                                    </label>
                                    @include('alerts.feedback', ['field' => 'publish'])
                                </div>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="publish" id="exampleRadios1"
                                            value="Ya">
                                        <span class="form-check-sign"></span>
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="publish" id="exampleRadios1"
                                            value="Tidak">
                                        <span class="form-check-sign"></span>
                                        Tidak
                                    </label>
                                </div>


                                <div class="form-group{{ $errors->has('kode_unik_voucher') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-kode_unik_voucher">
                                        <i class="w3-xxlarge fa fa-map"></i>{{ __('kode unik voucher') }}
                                    </label>
                                    <input type="text" name="kode_unik_voucher" id="input-kode_unik_voucher"
                                        class="form-control{{ $errors->has('kode_unik_voucher') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Kode Unik Voucher') }}" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'kode_unik_voucher'])
                                </div>

                                <div class="form-group{{ $errors->has('kategori') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-kategori">
                                        <i class="w3-xxlarge fa fa-hand-o-down"></i>{{ __('kategori') }}
                                    </label>
                                    <select name="kategori" id="kategori" class="col-md-3 dropdown">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategori as $item)
                                        <option value="{{$item->nama}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'kategori'])
                                </div>


                                <div class="form-group{{ $errors->has('level') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-level">
                                        <i class="w3-xxlarge fa fa-users"></i>{{ __('level kesulitan') }}
                                    </label>
                                    <select name="level" id="level" class="col-md-3 dropdown">
                                        <option value="">Pilih Level Training</option>
                                        @foreach ($level as $item)
                                        <option value="{{$item->nama}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'level'])
                                </div>

                                <div
                                    class="form-group{{ $errors->has('pengalaman_kerja_peserta') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-pengalaman_kerja_peserta">
                                        <i class="w3-xxlarge fa fa-map"></i>{{ __('pengalaman kerja peserta') }}
                                    </label>
                                    <input type="text" name="pengalaman_kerja_peserta"
                                        id="input-pengalaman_kerja_peserta"
                                        class="form-control{{ $errors->has('pengalaman_kerja_peserta') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Pengalaman Kerja Peserta') }}" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'pengalaman_kerja_peserta'])
                                </div>

                                <div
                                    class="form-group{{ $errors->has('kemampuan_dasar_peserta') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-kemampuan_dasar_peserta">
                                        <i class="w3-xxlarge fa fa-map"></i>{{ __('kemampuan dasar peserta') }}
                                    </label>
                                    <input type="text" name="kemampuan_dasar_peserta" id="input-kemampuan_dasar_peserta"
                                        class="form-control{{ $errors->has('kemampuan_dasar_peserta') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Kemampuan Dasar Peserta') }}" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'kemampuan_dasar_peserta'])
                                </div>

                                <div
                                    class="form-group{{ $errors->has('kemampuan_teknis_peserta') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-kemampuan_teknis_peserta">
                                        <i class="w3-xxlarge fa fa-map"></i>{{ __('kemampuan teknis peserta') }}
                                    </label>
                                    <input type="text" name="kemampuan_teknis_peserta"
                                        id="input-kemampuan_teknis_peserta"
                                        class="form-control{{ $errors->has('kemampuan_teknis_peserta') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Kemampuan Teknis Peserta') }}" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'kemampuan_teknis_peserta'])
                                </div>

                                <div class="form-group{{ $errors->has('bahan_materi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-bahan_materi">
                                        <i class="w3-xxlarge fa fa-map"></i>{{ __('Bahan Materi') }}
                                    </label>
                                    <input type="text" name="bahan_materi" id="input-bahan_materi"
                                        class="form-control{{ $errors->has('bahan_materi') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Bahan Materi') }}" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'bahan_materi'])
                                </div>

                                <div class="form-group{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-gambar">
                                        <i class="w3-xxlarge fa fa-file-photo-o"></i>{{ __('gambar') }}
                                    </label>
                                    <input type="file" name="gambar" id="input-gambar"
                                        class="form-control{{ $errors->has('gambar') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Upload Gambar Webinar') }}" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'gambar'])
                                </div>

                                <div class="form-group{{ $errors->has('deskripsi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-deskripsi">
                                        <i class="w3-xxlarge fa fa-commenting-o"></i>{{ __('deskripsi') }}
                                    </label>
                                    <textarea class="form-control" placeholder="Isi Deskripsi Training" name="deskripsi"
                                        rows="5"></textarea>

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