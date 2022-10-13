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
    <a href="{{url('/')}}">Add User</a>
   <table class="table">
      <thead>
        <tr>
          <th>SL</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>status</th>
          <th>created_at</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr class="{{$user->id == request()->id ? 'bg-success text-white' : ''}}">
          <td>{{$loop->iteration}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->phone}}</td>
          <td>{{$user->address}}</td>
          <td>{{$user->status == 0 ? 'Inactive' : 'Active' }}</td>
          {{-- <td>{{date('D-M-Y',strtotime($user->created_at))}}</td> --}}
          <td>{{$user->created_at->diffForHumans()}}</td>
          <td>
            <a href="{{route('user.edit',$user->id)}}">Edit</a>
            <a href="{{route('user.delete',$user->id)}}">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
   </table>
   {{$users->links()}}
  </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>