@extends('NewLogin.main')


@section('content')
<section class="header" >
    <nav id="header-nav" style="background-color:rgba(173, 171, 167, 0.3);">
      
        <h4>Countries</h4>
        <div class="nav-links" >
         
            <ul>
                <li><button  onclick="add()"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="county-a" id="add"><i class="bi bi-plus"></i>Add </button></li>   
                <li><button class="county-a"><i class="bi bi-eye"></i>show</button></li>
                <li><button class="county-a"><i class="bi bi-three-dots"></i>Showall</button></li>
            </ul>
           
        </div>
    </nav>
{{-- body --}}
    
           <div class="row-country nodata">
                <table class="table" id="userTable">
                    
                     <img id="nodata" src="{{asset('iris/no-data.jpg')}}" width="40%" height="30%" style="justify-content:center;text-align: center;" alt="">
               
                 
                </table>
              </div>
            </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color:aqua">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>




 <div class="modal-body" id="countryAdd">
    
            <form action="{{route('country.add')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="" >Country Name:</label>
                  <input type="text" class="form-control" name="country" required/>
                </div>
                <div class="form-group">
                    <label for="">Country Code:</label>
                    <input type="text" class="form-control" name="code" required/>
                  </div>
                  <div class="modal-footer form-group">
                   
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="add" class="btn btn-primary">Submit</button>
                  </div>
              </form>
        </div>
      
      
    </div>
  </div>
</div>


</section>


    <script type="text/javascript">
    //   $("#generalButton").hide();
    //   $("#pmsButton").hide();
    $('#countryAdd').hide();
    $('#countryUpdate').hide();
    function add(){
                     $('#countryAdd').show();
                       $('#countryUpdate').hide();
                    }

                    

      function update(){
                     $('#countryAdd').hide();
                       $('#countryUpdate').show();
                    }

                    

            $(document).ready(function() {
            toastr.options.timeOut = 1000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });

</script>


@endsection