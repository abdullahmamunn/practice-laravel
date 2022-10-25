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
    <a href="{{route('show.data')}}">View Data</a>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('form.submit')}}" method="post">
      @csrf
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" id="" placeholder="Enter name">
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" class="form-control" id="" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="">Phone</label>
        <input type="text" name="phone" class="form-control" id="" placeholder="Phone">
      </div>
      <div class="form-group">
        <label for="">Address</label>
         <textarea class="form-control" name="address" id="" cols="5" rows="5"></textarea>      
      </div>
      <div class="form-check">
        <input type="checkbox" name="status" class="" id="">
        <label class="" for="">Status</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>