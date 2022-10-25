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
    <h1 class="text-center">User data</h1>
    <a href="{{route('pictures.create')}}">Add User</a>
   <table class="table">
      <thead>
        <tr>
          <th>SL</th>
          <th>Name</th>
          <th>PIC_ID</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pictures as $picture)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$picture->name}}</td>
          <td>{{$picture->picture_id}}</td>
          <td>
            <a href="{{route('pictures.edit',$picture->id)}}">Edit</a>
            <a href="{{route('pictures.destroy',$picture->id)}}">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
   </table>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
