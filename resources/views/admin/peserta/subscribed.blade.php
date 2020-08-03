@extends('layouts.app', ['activePage' => 'subscribed-peserta', 'title' => 'Subscribed Peserta', 'navName' => 'Subscribed', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Peserta Yang Subscribed</h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor Hp</th>
                                </thead>
                                <tbody>
                                    {{-- @php
                                        $nomor = 1
                                    @endphp
                                    @forelse ($peserta as $item)
                                    <tr>
                                        <td>{{$nomor}}</td>
                                        <td>{{$item->nama_lengkap}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->nomor_hp}}</td>
                                    </tr>
                                    @php
                                        $nomor = $nomor + 1;
                                    @endphp    
                                    @empty
                                        <td colspan="4">Belum Ada Data</td>
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