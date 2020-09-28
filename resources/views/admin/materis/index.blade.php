@extends('layouts.app', ['activePage' => 'table-quiz', 'title' => 'Materi Pelatihan', 'navName' => 'Materi
Pelatihan', 'activeButton' => 'training'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        {{Session::put('success', null)}}
                        @endif
                        <h4 class="card-title">Materi</h4>
                        <a href="{{route('create-quiz', $pelatihan->id)}}" class="btn btn-warning">Tambah</a>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Url Video</th>
                                <th>Deskripsi</th>
                                <th>Durasi</th>
                                <th>File</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php
                                $nomor = 1;
                                @endphp
                                @forelse ($materi as $item)
                                <tr>
                                    <td>{{$nomor}}</td>                    
                                    <td>{{$item->judul}}</td>
                                    <td>{{$item->url_video}}</td>
                                    <td>{{$item->deskripsi}}</td>
                                    <td>{{$item->durasi}}</td>
                                    @if ($item->file == 'nofile.txt')
                                        <td>Tidak Ada</td>
                                    @else
                                    <td>{{$item->file}}</td>    
                                    @endif
                                    <td><a href="{{route('edit-quiz', $item->id)}}" class="btn btn-warning">Edit</a>
                                        <form action="{{route('delete-quiz', $item->id)}}" method="post">
                                            @csrf
                                            @method('post')
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                $nomor = $nomor + 1;
                                @endphp
                                @empty
                                <tr>
                                    <td colspan="11" class="text-center text-primary">Belum Ada Data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection