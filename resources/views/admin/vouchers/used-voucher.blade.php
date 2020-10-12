@extends('layouts.app', ['activePage' => 'used-voucher', 'title' => 'Pelatihan', 'navName' => 'Tambah Pelatihan',
'activeButton' => 'voucher'])

{{-- @section('link-modal')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
@endsection --}}

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{Session::get('message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        {{Session::put('message', null)}}
                        @endif

                        @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{Session::get('error')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        {{Session::put('error', null)}}
                        @endif
                        <h4 class="card-title">Data Pelatihan</h4>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No.</th>
                                <th>Nama Pelatihan</th>
                                <th>Kode Voucher</th>
                                <th>Jumlah Voucher Tersedia</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php
                                $nomor = 1;
                                @endphp
                                {{-- @forelse ($pelatihan as $item)
                                <tr>
                                    <td>{{$nomor}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->kode_unik_voucher}}</td>
                                    @if ($item->voucher === null)
                                    <td>0</td>
                                    @else
                                    <td>{{$item->voucher}}</td>
                                    @endif
                                    <td> 
                                        <a href="{{route('form-create-voucher', $item->id)}}" class="btn btn-primary"> Tambah Voucher</a>
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
        {{-- @include('admin.trainings.modal') --}}
    </div>

</div>
</div>
@endsection

{{-- @section('script-modal')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection --}}