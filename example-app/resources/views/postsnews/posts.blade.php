<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <section>
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="card">
                       <div class="card-header">
                 <h1>All Posts</h1>
                </div>
                <div class="card-body">
                    @if(Session::has('post_deleted'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('post_deleted')}}
                    </div>
                    @endif
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th>Post Title</th>
                             <th>Post Body</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($posts as $post)
                             <tr>
                                 <td>{{$post->title}}</td>
                                 <td>{{$post->body}}</td>
                                <td>
                                    <a  class="btn btn-success" href="/postsnews/posts/{{$post->id}}">view</a>
                                    <a  class="btn btn-info" href="/postsnews/edit-post/{{$post->id}}">Edit</a>
                                    <a  class="btn btn-danger" href="/postsnews/delete-post/{{$post->id}}">Delete</a>
                               
                                </td>
                                {{-- <td><a href="/edit-post/{{$post->id}}">Edit</a></td> --}}

                             </tr>
                         @endforeach
                     </tbody>
                 </table>
               </div>
               </div>
            </div> 
        </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>