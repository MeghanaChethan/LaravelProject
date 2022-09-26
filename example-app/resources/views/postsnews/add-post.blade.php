<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <section>
       <div class="container">
           <div class="row">
               <div class="col-md-6 offset-md-3">
                   <div class="card">
                       <div class="card-header">
                           Add New Post
                    </div>
                    <div class="card-body">
                        @if(Session::has('post_created'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('post_created')}}
                        </div>
                        @endif
                   <form action="{{route('post.addsubmit')}}" method="POST">
                       @csrf
                       <div class="form-froup">
                           <label for="title">Post Title</label>
                           <input type="text" name="title" class="form-control" placeholder="Enter post title"/>
                       </div>
                       <div class="form-froup">
                        <label for="body">Enter Post Body</label>
                        <textarea type="text" name="body" class="form-control"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success" value="Add Post" />
                   </form>
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