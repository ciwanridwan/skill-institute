@extends('layouts.app', ['activePage' => 'create-voucher', 'title' => 'Voucher Pelatihan', 'navName' => 'Tambah Voucher',
'activeButton' => 'voucher'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="section-image">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="row">

                <div class="card col-md-8">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{Session::get('success')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {{Session::put('success', null)}}
                                @endif
                                <h3 class="mb-0">{{ __('Tambah Voucher') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('store-create-voucher', $voucher->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            @include('alerts.success')
                            @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('voucher') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-voucher">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('Voucher') }}
                                    </label>
                                    <input type="text" name="voucher" id="input-voucher"
                                        class="form-control{{ $errors->has('voucher') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Enter Your Voucher') }}" value="{{$voucher->voucher}}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'voucher'])
                                </div>

                                <div class="form-group{{ $errors->has('kode') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-kode">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('Kode') }}
                                    </label>
                                    <input type="text" name="kode" id="input-kode"
                                        class="form-control{{ $errors->has('kode') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Enter Your Code') }}" value="{{$voucher->kode_unik_voucher}}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'kode'])
                                </div>

                                <div class="form-group{{ $errors->has('pelatihan_id') ? ' has-danger' : '' }}">
                                    {{-- <label class="form-control-label" for="input-pelatihan_id">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('pelatihan_id') }}
                                    </label> --}}
                                    <input type="hidden" name="pelatihan_id" id="input-pelatihan_id"
                                        class="form-control{{ $errors->has('pelatihan_id') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Enter Your Code') }}" value="{{$voucher->id}}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'pelatihan_id'])
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default mt-4">{{ __('Tambah') }}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection