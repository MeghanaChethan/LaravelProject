<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Teacher</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

    <div class="container" style="border:1px solid black;padding-top:70px;">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card-header">
                    Add New Teacher
                </div>
                <div class="card-body">
                    <form action="{{route('teacher.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="file">Choose Profile Image</label>
                        <input type="file" name="file" class="form-control" onchange="onFileSelected(event)">
                        <img  alt="Profile Image" id="previewImg" style="max-width:130px;margin-top:20px;">
               
                    </div>
                    <input type="submit" class="btn btn-primary float-right" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        funtion previewFile(input){
            var file = $("input[type=file]").get(0).files[0];
            if(file)
            {
                var reader = new FileReader();
                reader.onload = function(){
                    $("#previewImg").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script> --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>




{{-- <div id="form" class="form">

    <div class="container">
      <label>Photo</label>
      <div style="min-height: 200px; border: solid 1px lightgrey">
        <img id="imgElement" src="" width=280px>
      </div>
      <input id="fileinput" type="file" enctype='multipart/form-data' onchange="onFileSelected(event)"></input>
    </div>
  
    <div class="container">
      <input id="cancelBtn" type="button" value="Cancel">
      <input id="saveBtn" type="button" value="Save">
    </div>
  
  </div> --}}

  <script>
  function onFileSelected(event) {
    var selectedFile = event.target.files[0];
    var reader = new FileReader();
  
    var imgtag = document.getElementById("imgElement");
    // imgtag.title = selectedFile.name;
  
    reader.onload = function(event) {
        $("#previewImg").attr("src", reader.result);
    //   imgtag.src = event.target.result;
    };
    reader.readAsDataURL(selectedFile);
  }
</script>
</body>
</html>