@extends('layouts.app', ['activePage' => 'popular-pelatihan', 'title' => 'Pelatihan Terpopuler', 'navName' => 'Pelatihan Yang Populer',
'activeButton' => 'training'])

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
                        <h4 class="card-title">Pelatihan Terpopuler</h4>
                        <a href="{{route('create-popular')}}"
                            class="btn btn-warning">Tambah</a>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No.</th>
                                <th>Urutan</th>
                                <th>Judul Pelatihan</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php
                                $nomor = 1;
                                @endphp
                                @forelse ($popular as $item)
                                <tr>
                                    <td>{{$nomor}}</td>
                                    <td>{{$item->urutan}}</td>
                                    @foreach ($item->pelatihans as $p)
                                    <td>{{$p->nama}} </td>    
                                    @endforeach
                                    <td><a href="{{route('edit-populer', $item->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{route('delete-populer', $item->id) }}" method="post">
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
                                <td colspan="11">Belum Ada Data</td>
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