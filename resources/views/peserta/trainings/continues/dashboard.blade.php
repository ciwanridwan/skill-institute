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
                        <h4 class="card-title">{{ __('Informasi Pelatihan') }}</h4>
                        {{-- <p class="card-category">{{ __('Pantauan 24 Jam') }}</p> --}}
                    </div>
                    <div class="card-body">
                        
                        @foreach ($pelatihan as $item)
                        <img src="{{asset('storage/gambar_pelatihan/'. $item->gambar)}}" alt="{{$item->nama}}" width="600px" height="400px">
                        {{-- <video width="400" controls>
                            <source src="{{$p->url_video}}" type="video/mp4">
                        </video> --}}
                        <h4>Deskripsi : {{$item->deskripsi}}</h4>
                        <h4>Trainer : {{$item->trainer}}</h4>
                        <h4>Kategori : {{$item->kategori}}</h4>
                        <h4>Level Training : {{$item->level}}</h4>
                        <h4>Alat Yang Dibutuhkan : {{$item->alat_training}}</h4>
                        <h4>Bahan Materi : {{$item->bahan_materi}}</h4>
                        <h4>Pengalaman Kerja Peserta : {{$item->pengalaman_kerja_peserta}}</h4>
                        <h4>Kemampuan Dasar Peserta : {{$item->kemampuan_dasar_peserta}}</h4>
                        <h4>Bahan Materi : {{$item->bahan_materi}}</h4>
                    </div>
                    <div class="card-footer ">
                        <div class="legend">
                            
                        </div>
                        <hr>                        
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