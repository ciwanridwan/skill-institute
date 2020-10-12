@extends('layouts.trainings.app', ['activePage' => 'training', 'title' => 'Pelatihan', 'navName' => 'Pelatihan Saya',
'activeButton' => 'pelatihan'])

@section('css-video')
<style>
    video {
        width: 90%;
        height: auto;
    }
</style>
@endsection

@section('style-modal')
<style>
    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 60%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .button-modif {
        background-color: #d1162f;
        border: none;
        color: white;
        padding: 10px 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        position: relative;
    }
</style>
<style>
    * {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">{{ __('Informasi Pelatihan') }}</h4>
                        {{-- <p class="card-category">{{ __('Pantauan 24 Jam') }}</p> --}}
                    </div>
                    <div class="card-body">

                        @foreach ($materi as $item)
                        <video width="400" controls autoplay>
                            <source src="{{$item->url_video}}" type="video/mp4">
                        </video>
                    </div>
                    <div class="card-footer ">
                        <div class="legend">
                            <h5>Deskripsi : {{$item->deskripsi}}</h5> 
                        </div>
                        <hr>
                        @endforeach
                        <a href="{{ $materi->nextPageUrl() }}" class="btn btn-warning" >Selanjutnya</a>   
                    </div>
                    <!-- Trigger/Open The Modal -->
                    <button id="myBtn" class="button-modif" style="width: 20%">Lanjut Quiz</button>
                    <!-- The Modal -->
                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                          @if (Session::has('failed'))
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              {{Session::get('failed')}}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          {{Session::put('failed', null)}}
                          @endif
                            <span class="close">&times;</span>
                            @forelse ($quiz as $qu)
                            <p>{{$qu->soal}}</p>
                            <div class="container">
                                <form action="{{route('confirm-soal')}}" enctype="multipart/form-data" method="POST">
                                  @csrf
                                  @method('POST')
                                  <div class="row">
                                    <div class="col-25">
                                      <label for="fname">Pilihan A</label>
                                    </div>
                                    <div class="col-75">
                                      <input type="text" id="fname" name="firstname" placeholder="" value="{{$qu->pilihan1}}" readonly>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-25">
                                      <label for="lname">Pilihan B</label>
                                    </div>
                                    <div class="col-75">
                                      <input type="text" id="fname" name="firstname" placeholder="" value="{{$qu->pilihan2}}" readonly>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-25">
                                      <label for="country">Pilihan C</label>
                                    </div>
                                    <div class="col-75">
                                      <input type="text" id="fname" name="firstname" placeholder="" value="{{$qu->pilihan3}}" readonly>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-25">
                                      <label for="subject">Pilihan D</label>
                                    </div>
                                    <div class="col-75">
                                      <input type="text" id="fname" name="firstname" placeholder="" value="{{$qu->pilihan4}}" readonly>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-25">
                                      <label for="subject">Jawaban</label>
                                    </div>
                                    <div class="col-75">
                                      <select id="jawaban" name="jawaban">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                  </div>
                                </form>
                              </div>
                                 
                            @empty
                                <h3>Quiz Belum Tersedia</h3>
                            @endforelse
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
        </div>
    </div>
</div>
@endsection

@section('modal-js')
<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
</script>
@endsection