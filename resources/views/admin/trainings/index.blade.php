@extends('layouts.app', ['activePage' => 'training', 'title' => 'Pelatihan', 'navName' => 'Data Training', 'activeButton' => 'training'])

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
                            <h4 class="card-title">Data Pelatihan</h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Trainer</th>
                                    <th>Harga</th>
                                    <th>Tipe</th>
                                    <th>Bahan Materi</th>
                                    <th>Kode Unik Voucher</th>
                                    <th>Kategori</th>
                                    <th>Level</th>
                                    <th>Alat Training</th>
                                    <th>Publish</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @php
                                        $nomor = 1;
                                    @endphp
                                    @forelse ($training as $item)
                                    <tr>
                                        <td>{{$nomor}}</td>
                                        <td><img src="{{ asset('storage/gambar_pelatihan/' . $item->gambar) }}" alt="" style="width: 200px; height: 200px;"></td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->trainer}}</td>
                                        <td>{{$item->harga}}</td>
                                        <td>{{$item->tipe}}</td>
                                        <td>{{$item->bahan_materi}}</td>
                                        <td>{{$item->kode_unik_voucher}}</td>
                                        <td>{{$item->kategori}}</td>
                                        <td>{{$item->level}}</td>
                                        <td>{{$item->alat_training}}</td>
                                        <td>{{$item->publish}}</td>
                                        <td><a href="{{route('edit-training', $item->id) }}" class="btn btn-warning">Edit</a></td>
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