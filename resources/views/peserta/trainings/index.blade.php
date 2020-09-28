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
                                <th>Pelatihan</th>
                                <th>Mulai Pelatihan</th>
                                <th>Selesai Pelatihan</th>
                                <th>Kode Voucher</th>
                                <th>Action</th>
                            </thead>
                            {{-- <col width=1000> --}}
                            <tbody>
                                @php
                                $nomor = 1;
                                @endphp
                                @forelse ($pelatihan as $item)
                                <tr>
                                    <td>{{$nomor}}</td>
                                    @foreach ($item->pelatihans as $p)
                                    <td>{{$p->nama}}</td>
                                    @endforeach
                                    <td>{{$item->created_at}}</td>
                                    <td>-</td>
                                    @foreach ($item->vouchers as $p)
                                    <td>{{$p->kode}}</td>
                                    @endforeach
                                    <td>
                                        @if ($item->status == 1)
                                        <a href="{{route('dashboard-pelatihan', $item->id)}}" class="btn btn-warning">Mulai</a> </td>    
                                        @elseif ($item->status == 3)
                                        <a href="#" class="btn btn-warning">Halaman Training</a> </td>
                                        @else
                                        <a href="#" class="btn btn-warning">Lanjut</a> </td>
                                        @endif
                                        
                                        <td>
                                        <form action="#" method="post">
                                            @csrf
                                            @method('post')
                                            <button class="btn btn-danger" type="submit">Beri Review</button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                $nomor = $nomor + 1;
                                @endphp
                                @empty
                                <td colspan="11">Belum Membeli Pelatihan</td>
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