<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Email via PHPMaler in Laravel 7</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    
    <div class="container">
        <div class="row" style="margin-top:45px">
  <div class="col-md-4 offset-md-4">
      
    <h4>Send Email via PHPMaler in Laravel 7</h4>
    <hr>
    <form action="{{ route('email.send') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="">Subject</label>
            <input type="text" class="form-control" name="subject" placeholder="Enter subject">
        </div>
        <div class="form-group">
          <textarea name="message" id="" cols="4" rows="4" class="form-control"
          placeholder="Message here...."></textarea>
        </div>
        <button type="submit" class="btn btn-block btn-success">Send Email</button>
    </form>
  </div>
        </div>
    </div>
</body>
</html>