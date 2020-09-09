<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test Chart</title>

    <!-- Fonts -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
</head>

<body>
    <div class="container">
        <br />
        @if (Session::has('success'))
        <div>
            <p class="alert alert-success">{{Session::get('success')}}</p>
        </div>
        {{Session::put('success', null)}}
        @endif

        <form action="{{url('chart/store-add')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="year">Tahun</label>
               <select class="" name="year" id="year">
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js"
        charset="utf-8"></script>
</body>

</html>