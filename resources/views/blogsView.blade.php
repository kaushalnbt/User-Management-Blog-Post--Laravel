
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>userbase</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">S No.</th>
        <th scope="col">Title</th>
        <th scope="col">Blog Content</th>
        <th scope="col">Time</th>
        <th scope="col">User Id</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        <th scope="col">Blogs</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $key => $user)
      <tr id="{{$user->id}}">
        <td>{{ ++$key }}</td>
        <td>{{ $user->title }}</td>
        <td>{{ $user->body }}</td>
        <td>{{ $user->created_at}}</td>
        <td>{{ $user->users_id }}</td>
        <td><a class="bi bi-pen" id="{{ $user->id }}" href="{{ url('edit_blogs/'.$user->id) }}"></a></td>
        <td><a class="bi bi-trash3" id="{{ $user->id }}" onclick="myFunction(this,'{{route('deleteblog',$user->id)}}')"></a></td>
        <td><a class="bi bi-chat-left-dots" id="{{ $user->id }}" href="{{ url('blogs/'.$user->id) }}"></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <script>
    function myFunction(e, url) {
      var id=e.id;

      var result = confirm("Are You Sure to delete");
      if (result == true) {
        $.ajax({
          type: 'delete',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: url,
          user: {
            'id': e.id,
          },
            success: function(response, textStatus, xhr) {
            if (response == 1) {
              alert("user deleted Successfully");
              $("#" + id).remove();
            } else {
              alert("Oops.. Something went wrong");
            }

          }
        });
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>