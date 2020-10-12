@extends('layouts.app-user', ['activePage' => 'webinar', 'title' => 'Webinar', 'navName' => 'Webinar',
'activeButton' => 'webinar'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">{{ __('Informasi Webinar') }}</h4>
                        {{-- <p class="card-category">{{ __('Pantauan 24 Jam') }}</p> --}}
                    </div>
                    <div class="card-body">
                        @foreach ($play as $item)
                        <img src="{{asset('storage/gambar/'. $item->gambar)}}" alt="{{$item->nama}}" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
                        
                        <h4 style="text-align: center">Judul : {{$item->judul}}</h4>
                        <h4 style="text-align: center">Trainer : {{$item->trainer}}</h4>
                        <h4 style="text-align: center">Deskripsi : {{$item->deskripsi}}</h4>
                        <h4 style="text-align: center">Jadwal : {{$item->jadwal}}</h4>
                        <a target="_blank" href="{{$item->link}}" class="btn btn-primary" style="text-align: center">Lanjut Webinar</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
    </div>
</div>
@endsection