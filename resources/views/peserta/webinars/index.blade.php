@extends('layouts.app-user', ['activePage' => 'webinar', 'title' => 'Webinar', 'navName' => 'Webinar',
'activeButton' => 'webinar'])

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
                        <h4 class="card-title">Webinar</h4>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>NO</th>
                                <th>Webinar</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Link</th>    
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php
                                $nomor = 1;
                                @endphp
                                @forelse ($binar as $item)
                                <tr>
                                    <td>{{$nomor}}</td>
                                    
                                    <td>{{$item->judul}}</td>
                                    <td>{{$item->jadwal}}</td>
                                    <td>{{$item->link}}</td>
                                    @if ($web->status == 1)
                                        <td><form action="{{route('update-status-webinar')}}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-warning" type="submit">Mulai</button>
                                        </form></td>
                                        @else 
                                        <td>
                                        <a target="_blank" href="{{route('start-webinar', $item->judul)}}" class="btn btn-warning">Lanjut</a> </td>
                                    @endif
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