<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Teachers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>

    <div class="container" style="border:1px solid black;padding-top:70px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                  All Teachers <a href="{{route('teacher.add')}}" class="btn btn-primary float-right">Add New</a>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Profile Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($teachers as $teacher)
                              
                          <tr>
                              <td>{{$teacher->id}}</td>
                              <td>{{$teacher->name}}</td>
                              {{-- <td>{{$teacher->profileimage}}</td> --}}
                              <td><img src="{{asset('images')}}/{{$teacher->profileimage}}"  style="max-height:60px" alt=""></td>
                                <td>
                                    <a href="/edit-teacher/{{$teacher->id}}" class="btn btn-info">Edit</a>
                                    <a href="/delete-teacher/{{$teacher->id}}" class="btn btn-danger">Delete</a>

                                </td>
                              
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>

  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script  src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


{{-- @if(Session::has('record_added'))
<script>
    toastr.success("{!!Session::get('record_added')!!}");
    </script>
@endif --}}

</body>
</html>