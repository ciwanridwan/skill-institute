@extends('layouts.app', ['activePage' => 'webinar', 'title' => 'Webinar', 'navName' => 'Data Webinar', 'activeButton' =>
'webinar'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-14">
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
                        <h4 class="card-title">Data Webinar</h4>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Jadwal</th>
                                <th>Link</th>
                                <th>Kuota Pendaftaran</th>
                                <th>Harga</th>
                                <th>Tipe</th>
                                <th>Trainer</th>
                                <th>Publish</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php
                                $nomor = 1;
                                @endphp
                                @forelse ($webinar as $item)
                                <tr>
                                    <td>{{$nomor}}</td>
                                    <td><img src="{{ asset('storage/gambar/' . $item->gambar) }}" alt=""
                                            style="width: 200px; height: 200px"></td>
                                    <td>{{$item->judul}}</td>
                                    <td>{{$item->jadwal}}</td>
                                    <td>{{$item->link}}</td>
                                    <td>{{$item->kuota_pendaftaran}}</td>
                                    <td>Rp. {{ number_format($item->harga, 2, ',', '.')}}</td>
                                    <td>{{$item->tipe}}</td>
                                    <td>{{$item->trainer}}</td>
                                    <td>{{$item->publish}}</td>
                                    <td><a href="{{route('edit-webinar', $item->id)}}" class="btn btn-warning">Edit</a>
                                        <form action="{{route('delete-webinar', $item->id)}}" method="post">
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