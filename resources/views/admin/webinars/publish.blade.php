@extends('layouts.app', ['activePage' => 'publish-webinar', 'title' => 'Publish Webinar', 'navName' => 'Publikasi Webinar',
'activeButton' => 'webinar'])

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
                        <h4 class="card-title">Data Webinar</h4>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No.</th>
                                <th>Judul Webinar</th>
                                <th>Harga</th>
                                <th>Link</th>
                                {{-- <th>Tipe</th>
                                <th>Kode Unik Voucher</th> --}}
                                <th>Publish</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php
                                $nomor = 1;
                                @endphp
                                @forelse ($publish as $item)
                                <tr>
                                    <td>{{$nomor}}</td>
                                    <td>{{$item->judul}}</td>
                                    <td>Rp. {{ number_format($item->harga, 2, ',', '.')}}</td>
                                    <td>{{$item->link}}</td>
                                    <td>{{$item->publish}}</td>
                                    @if ($item->publish === 'Tidak')
                                    <td>
                                        <form action="{{route('publish-webinar', $item->id) }}" method="post">
                                            @csrf
                                            @method('post')
                                            <button class="btn btn-warning" type="submit">Publish</button>
                                        </form>
                                    </td>
                                    @else
                                    <td>
                                        <form action="{{route('unpublish-webinar', $item->id) }}" method="post">
                                            @csrf
                                            @method('post')
                                            <button class="btn btn-danger" type="submit">UnPublish</button>
                                        </form>
                                    </td>
                                    @endif
                                    {{-- <td><a href="{{route('edit-training', $item->id) }}"
                                            class="btn btn-warning">Publish</a>
                                        <form action="{{route('delete-training', $item->id) }}" method="post">
                                            @csrf
                                            @method('post')
                                            <button class="btn btn-danger" type="submit">Unpublish</button>
                                        </form>
                                    </td> --}}
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