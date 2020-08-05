@extends('layouts.app', ['activePage' => 'create-level', 'title' => 'Level Training', 'navName' => 'Create Level', 'activeButton' => 'create-level'])

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
                                        <p class="alert alert-success">
                                            {{Session::get('success')}}
                                        </p>
                                        {{Session::put('success', null)}}
                                    @endif
                                    <h3 class="mb-0">{{ __('Tambah Level Training') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('store-level') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                @method('post')                                
                                
                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-nama">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('nama level') }}
                                        </label>
                                        <input type="text" name="nama" id="input-nama" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Level') }}" value="" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'nama'])
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