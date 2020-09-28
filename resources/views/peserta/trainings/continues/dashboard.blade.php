@extends('layouts.trainings.app', ['activePage' => 'training', 'title' => 'Pelatihan', 'navName' => 'Pelatihan Saya',
'activeButton' => 'pelatihan'])

@section('css-video')
<style>
    video {
        width: 90%;
        height: auto;
    }
</style>
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">{{ __('Video Pertama') }}</h4>
                        {{-- <p class="card-category">{{ __('Pantauan 24 Jam') }}</p> --}}
                    </div>
                    <div class="card-body">
                        {{-- <div id="chartHours" class="ct-chart"></div> --}}
                        @foreach ($pelatihan as $item)
                        @foreach ($item->materis as $p)
                        <video width="400" controls>
                            <source src="{{$p->url_video}}" type="video/mp4">
                        </video>
                    </div>
                    <div class="card-footer ">
                        <div class="legend">
                            <h4>Deskripsi : {{$p->deskripsi}}</h4>
                        </div>
                        <hr>
                        <a href="" class="btn btn-primary" style="text-align: center">Lanjut Ke Quiz</a>
                        @endforeach
                        @endforeach
                        {{-- <a href="" class="btn btn-primary" style="text-align: center">Lanjut Ke Quiz</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
    </div>
</div>
@endsection