@extends('layouts.app-user', ['activePage' => 'training', 'title' => 'Pelatihan', 'navName' => 'Pelatihan Saya',
'activeButton' => 'pelatihan'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header">
                        @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        {{Session::put('success', null)}}
                        @endif
                        <h4 class="card-title">Data Pelatihan</h4>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>NO</th>
                                <th>Training</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php
                                $nomor = 1;
                                @endphp
                                {{-- @forelse ($training as $item)
                                <tr>
                                    <td>{{$nomor}}</td>
                                    <td><img src="{{ asset('storage/gambar_pelatihan/' . $item->gambar) }}" alt=""
                                            style="width: 200px; height: 200px;"></td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->trainer}}</td>
                                    <td>Rp. {{ number_format($item->harga, 2, ',', '.')}}</td>
                                    <td>{{$item->tipe}}</td>
                                    <td>{{$item->bahan_materi}}</td>
                                    <td>{{$item->kode_unik_voucher}}</td>
                                    <td>{{$item->kategori}}</td>
                                    <td>{{$item->level}}</td>
                                    <td>{{$item->alat_training}}</td>
                                    <td>{{$item->publish}}</td>
                                    <td><a href="{{route('edit-training', $item->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{route('delete-training', $item->id) }}" method="post">
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
                                @endforelse --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection