@extends('layouts.app', ['activePage' => 'edit-quiz', 'title' => 'Edit Materi', 'navName' => 'Edit Materi Pelatihan', 'activeButton' => 'training'])

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
                                        <p class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{Session::get('success')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </p>
                                        {{Session::put('success', null)}}
                                    @endif
                                    <h3 class="mb-0">{{ __('Edit Kategori') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('update-quiz', $materi->id) }}" autocomplete="off"
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
                                        <input type="text" name="judul" id="input-judul" class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}" placeholder="" value="{{$materi->judul}}">
        
                                        @include('alerts.feedback', ['field' => 'judul'])
                                    </div>

                                    <div class="form-group{{ $errors->has('url_video') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-url_video">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('url video') }}
                                        </label>
                                        <input type="text" name="url_video" id="input-url_video" class="form-control{{ $errors->has('url_video') ? ' is-invalid' : '' }}" placeholder="" value="{{$materi->url_video}}">
        
                                        @include('alerts.feedback', ['field' => 'url_video'])
                                    </div>

                                    <div class="form-group{{ $errors->has('deskripsi') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-deskripsi">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('deskripsi') }}
                                        </label>
                                        <input type="text" name="deskripsi" id="input-deskripsi" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" placeholder="" value="{{$materi->deskripsi}}">
        
                                        @include('alerts.feedback', ['field' => 'deskripsi'])
                                    </div>

                                    <div class="form-group{{ $errors->has('durasi') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-durasi">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('durasi') }}
                                        </label>
                                        <input type="text" name="durasi" id="input-durasi" class="form-control{{ $errors->has('durasi') ? ' is-invalid' : '' }}" placeholder="" value="{{$materi->durasi}}">
        
                                        @include('alerts.feedback', ['field' => 'durasi'])
                                    </div>

                                    <div class="form-group{{ $errors->has('file') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-file">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('file') }}
                                        </label>
                                        <input type="file" name="file" id="input-file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" placeholder="" value="{{$materi->judul}}">
        
                                        @include('alerts.feedback', ['field' => 'file'])
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('Edit') }}</button>
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