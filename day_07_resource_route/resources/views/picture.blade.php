<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <title>Laravel</title>
  </head>
  <body>
  <div class="container">
    <h1 class="text-center">Laravel Data Store in Model</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('pictures.store')}}" method="POST">
      @csrf
      @method('POST')
      <div class="form-group">
        <label for="">Pcture Name</label>
        <input type="text" name="name" class="form-control" id="" placeholder="Enter name">
      </div>
      <div class="form-group">
        <label for="">Picture Id</label>
        <input type="number" name="pic_id" class="form-control" id="" placeholder="Number">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
