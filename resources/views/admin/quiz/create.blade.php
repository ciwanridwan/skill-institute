@extends('layouts.app', ['activePage' => 'create-soal', 'title' => 'Quiz Materi', 'navName' => 'Tambah
Quiz Materi', 'activeButton' => 'training'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="section-image">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="row">

                <div class="card col-md-10">
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
                                <h3 class="mb-0">{{ __('Tambah Materi') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('store-soal') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            @include('alerts.success')
                            @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('soal') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-soal">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('soal') }}
                                    </label>
                                    <input type="text" name="soal" id="input-soal"
                                        class="form-control{{ $errors->has('soal') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Soal') }}" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'soal'])
                                </div>

                                <div class="form-group{{ $errors->has('pilihan1') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-pilihan1">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('pilihan a') }}
                                    </label>
                                    <input type="text" name="pilihan1" id="input-pilihan1"
                                        class="form-control{{ $errors->has('pilihan1') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Pilihan A') }}" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'pilihan1'])
                                </div>

                                <div class="form-group{{ $errors->has('pilihan2') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-pilihan2">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('pilihan B') }}
                                    </label>
                                    <input type="text" name="pilihan2" id="input-pilihan2"
                                        class="form-control{{ $errors->has('pilihan2') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Pilihan B') }}" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'pilihan2'])
                                </div>

                                <div class="form-group{{ $errors->has('pilihan3') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-pilihan3">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('pilihan C') }}
                                    </label>
                                    <input type="text" name="pilihan3" id="input-pilihan3"
                                        class="form-control{{ $errors->has('pilihan3') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Pilihan C') }}" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'pilihan3'])
                                </div>

                                <div class="form-group{{ $errors->has('pilihan4') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-pilihan4">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('Pilihan D') }}
                                    </label>
                                    <input type="text" name="pilihan4" id="input-pilihan4"
                                        class="form-control{{ $errors->has('pilihan4') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Pilihan D') }}" value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'pilihan4'])
                                </div>

                                <div class="form-group{{ $errors->has('jawaban') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-jawaban">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __('jawaban') }}
                                    </label>
                                    <select name="jawaban" id="jawaban" class="col-md-3 dropdown">
                                        <option value="">Pilih Jawaban</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'jawaban'])
                                </div>

                                <div class="form-group{{ $errors->has('materi_id') ? ' has-danger' : '' }}">
                                    <input type="hidden" name="materi_id" id="input-materi_id"
                                        class="form-control{{ $errors->has('materi_id') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{$p->id}}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'materi_id'])
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