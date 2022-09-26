<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dynamic Dependent</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style type="text/css">
    .box{
        width:600px;
        margin:0 auto;
        border:1px solid #ccc;
    }

    </style>
</head>
<body>
<br>

<h1>Hi, </h1>
<p>Sending Mail from Laravel.</p>
 
  <div class="container box">
      <h3 align="center">Ajax Dynamic Dependent Dropdown in laravel</h3><br>
      <div class="form-group">
          <select name="country" id="country" class="form-control input-lg dynamic" data-dependent="state">
                <option value="">Select Country</option>
                @foreach($country_list as $country)
                    <option value="{{$country->country}}">{{$country->country}}</option>
                @endforeach
          </select>
      </div>
      <br>
      <div class="form-group">
        <select name="state" id="state" class="form-control input-lg dynamic" data-dependent="city">
            <option value="">Slect State</option>
        </select>
      </div>
      <br>
      <div class="form-group">
        <select name="city" id="city" class="form-control input-lg dynamic">
            <option value="">Slect City</option>
        </select>
      </div>
      {{csrf_field()}}
      <br>
      <br>
  </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/xtp65i8sttdiby192ub38m3j0uoedye2ongm5vu2d52hrtqu/tnymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
       $(document).ready(function(){
            $('.dynamic').change(function(){
                if($this.val() != '')
                {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('dynamicdependent.fetch')}}",
                        method:"POST",
                        data:{select:select, value:value,_token:_token, dependent:dependent},
                        success:function(result)
                        {
                            $('#'+dependent).html(result);
                        }
                    })
                }
            });
       });
    </script>


</body>
</html>