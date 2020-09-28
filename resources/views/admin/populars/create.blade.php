@extends('layouts.app', ['activePage' => 'create-popular', 'title' => 'Urutkan Pelatihan Populer', 'navName' => 'Urutan
Pelatihan Populer', 'activeButton' => 'training'])

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
                                <h3 class="mb-0">{{ __('Tambah Urutan') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('store-popular') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            @include('alerts.success')
                            @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('pelatihan_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-pelatihan_id">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('Populer Training') }}
                                    </label>
                                    <select class="selectpicker" data-style="select-with-transition" title="Single Select" data-size="7" name="pelatihan_id">
                                        <option value="">Pilih Pelatihan</option>
                                        @foreach ($pelatihan as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>

                                    @include('alerts.feedback', ['field' => 'pelatihan_id'])
                                </div>

                                <div class="form-group{{ $errors->has('urutan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-urutan">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('Urutan Populer') }}
                                    </label>
                                    <input type="number" name="urutan" id="input-urutan"
                                        class="form-control{{ $errors->has('urutan') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('urutan Populer') }}" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'urutan'])
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