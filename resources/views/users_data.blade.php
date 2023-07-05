<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Database</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">S No.</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Address</th>
        <th scope="col">Gender</th>
        <th scope="col">Hobbies</th>
        <th scope="col">State</th>
        <th scope="col">User Image</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        <th scope="col">Post Blogs</th>
        <th scope="col">Blogs Count</th>
      </tr>
    </thead>
    <tbody>
      @php static $number=1;
      @endphp
      @foreach ($user as $users)
      <tr id="{{$users->id}}">
        <td>{{ $number++ }}</td>
        <td>{{ $users->Name }}</td>
        <td>{{ $users->Email }}</td>
        <td>{{ $users->Phone }}</td>
        <td>{{ $users->Address }}</td>
        <td>{{ $users->Gender }}</td>
        <td>{{ $users->Hobbies }}</td>
        <td>{{ $users->State }}</td>
        <td>
          <i class="bi bi-images" data-toggle="modal" data-target="#exampleModal" id="{{$users->id}}" onclick="showImage('{{$users->image}}')"></i>
        </td>
        <td><a class="bi bi-pen" id="{{ $users->id }}" href="{{ url('edit/'.$users->id) }}"></a></td>
        <td><a class="bi bi-trash3" id="{{ $users->id }}" onclick="myFunction(this,'{{route('deleteUser',$users->id)}}')"></a></td>
        <td><a class="bi bi-chat-left-dots" id="{{ $users->id }}" href="{{ url('blogs/'.$users->id) }}"></a></td>
        <td><a href="{{ url('blogsView/'.$users->id) }}"> {{ count($users->getBlogs) }}</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" value = "{{$users->id}}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User Image:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <center><img src="" height="300px" width="300px" id="profileImage" style="border-radius: 50%;" /></center>
        </div>
        
      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    function myFunction(e, url) {
      var id = e.id;

      var result = confirm("Are You Sure to delete");
      if (result == true) {
        $.ajax({
          type: 'delete',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: url,
          data: {
            'id': e.id,
          },
          success: function(response, textStatus, xhr) {
            if (response == 1) {
              alert("Data deleted Successfully");
              $("#" + id).remove();
            } else {
              alert("Oops.. Something went wrong");
            }

          }
        });
      }
    }
    
    function showImage(image)
    {
      $("#profileImage").attr("src",'http://127.0.0.1:8000/storage/images/'+image);
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>