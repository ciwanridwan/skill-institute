@extends('layouts.app', ['activePage' => 'table-kategori', 'title' => 'Kategori Pelatihan', 'navName' => 'Kategori Pelatihan', 'activeButton' => 'table-kategori'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            @if (Session::has('success'))
                            <p class="alert alert-success">
                                {{Session::get('success')}}
                                
                            </p>
                            {{Session::put('success', null)}}
                            @endif
                            <h4 class="card-title">Kategori</h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @php
                                        $nomor = 1;
                                    @endphp
                                    @forelse ($kategori as $item)
                                    <tr>
                                        <td>{{$nomor}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td><a href="{{route('edit-kategori', $item->id)}}" class="btn btn-warning">Edit</a></td>
                                    </tr>    
                                    @php
                                        $nomor = $nomor + 1;
                                    @endphp
                                    @empty
                                    <tr><td colspan="11" class="text-center text-primary">Belum Ada Data</td></tr>
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