@extends('layouts.app', ['activePage' => 'table-soal', 'title' => 'Quiz Materi', 'navName' => 'Soal/Quiz
Materi', 'activeButton' => 'training'])

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
                        <h4 class="card-title">Quiz</h4>
                        <a href="{{route('create-soal', $key->judul)}}" class="btn btn-warning">Tambah</a>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Soal</th>
                                <th>Pilihan A</th>
                                <th>Pilihan B</th>
                                <th>Pilihan C</th>
                                <th>Pilihan D</th>
                                <th>Jawaban</th>
                                <th colspan="3">Action</th>
                            </thead>
                            <tbody>
                                @php
                                $nomor = 1;
                                @endphp
                                @forelse ($soal as $item)
                                <tr>
                                    <td>{{$nomor}}</td>                    
                                    <td>{{$item->soal}}</td>
                                    <td>{{$item->pilihan1}}</td>
                                    <td>{{$item->pilihan2}}</td>
                                    <td>{{$item->pilihan3}}</td>
                                    <td>{{$item->pilihan4}}</td>
                                    <td>{{$item->jawaban}}</td>
                                    <td><a href="{{route('edit-soal', $item->id)}}" class="btn btn-warning">Edit</a>
                                        <form action="{{route('delete-soal', $item->id)}}" method="post">
                                            @csrf
                                            @method('post')
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                    {{-- <td>
                                    <a href="{{route('index-soal', $item->judul)}}" class="btn btn-primary">Quiz</a>
                                </td> --}}
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