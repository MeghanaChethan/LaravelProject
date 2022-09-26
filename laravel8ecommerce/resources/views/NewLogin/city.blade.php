@extends('NewLogin.main')

@section('content')

<section>
    <nav id="header-nav" style="background-color:rgba(173, 171, 167, 0.3);">
      
        <h4>Cities</h4>
        <div class="nav-links" >
         
            <ul>
                <li><button  onclick="add()"  data-bs-toggle="modal" 
                    data-bs-target="#exampleModal" class="county-a" id="add">
                    <i class="bi bi-plus"></i>Add </button></li>   
                <li><button class="county-a"><i class="bi bi-eye"></i>show</button></li>
                <li><button class="county-a"><i class="bi bi-three-dots"></i>Showall</button></li>
            </ul>
           
        </div>
    </nav>


    <div class="row-country">
        <table class="table" id="userTable">
            <thead>
                    <tr>
                        <th>#</th>
                        {{-- <th>Country</th> --}}
                        <th>city_key</th>
                        <th>City Name</th>
                        <th>Action</th>

                    </tr>
            </thead>
            <tbody id="utable">
                @if(!empty($cities) && $cities->count())
              @foreach ($cities as $key=>$city)
              <tr>
                <td>{{$no++ }}</td>
                <td>{{$city->city_key}}</td>
                  <td>{{$city->city}}</td>
               
                 <td>
                     <div class="dropdown dropleft">
                      <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                      </button>
                      
                      <ul class="dropdown-menu dropdown-menu-dark">
                        <li><button onclick="update()" class="dropdown-item active" href="/city/edit/{{$city->city_key}}" id="editCountry" 
                          data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button></li>
                          <li><button onclick="remove()" class="dropdown-item" 
                            data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button></li>
                        
                      </ul>
                    </div>
                 <td>
             </tr>
          @endforeach
          @else
          <tr>
              <td colspan="10"><img src="{{asset('iris/no-data.jpg')}}" alt="" width="600px;">
                <h1 style="text-align:center;">No Data Found </h1></td>

          </tr>

      @endif
           </tbody>
        </table>
        {{-- <div class="d-flex justify-content-center">
            {!! $cities->links() !!}
        </div> --}}
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header" style="background-color:aqua">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Add --}}


 <div class="modal-body" id="stateAdd">
    
  <form action="{{route('city.add')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
    {{csrf_field()}}

            <div class="mb-3 form-group">
                <select class="form-select form-select-lg mb-3 form-control" name="country_key" id="country">
                    <option selected disabled value="">Select country</option>
                    @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->country}}</option>
                    @endforeach
                </select>
            </div>

            {{-- state --}}
            <div class="mb-3 form-group">
                <select class="form-select form-select-lg mb-3 form-control" name="state_key" id="state">
                    
                </select>
            </div>

            {{-- city --}}
            {{-- <div class="mb-3"> --}}
                {{-- <select class="form-select form-select-lg mb-3 form-control" name="" id="city">
                </select> --}}
                
            {{-- </div> --}}

            <div class="form-group mb-3">
                <label for="">City:</label>
                <input type="text" class="form-control" name="city" required/>
              </div>

      
          <div class="modal-footer form-group">
           
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="add" class="btn btn-primary">Submit</button>
          </div>
      </form>
</div>


{{-- @if(!empty($city) && $city->count()) --}}

<div class="modal-body" id="stateUpdate">

  <form action="{{route('city.update')}}" method="POST">
      {{csrf_field()}}
      <h1>{{$city->city_key}}</h1>
      
      <input type="text" name="city_key" class="form-control" value="{{$city->city_key}}" placeholder="Enter post title"/>

      <div class="form-group">
           
        <label for="">State:</label>
        <select name="country_key" id="country_key" class="form-control input-lg dynamic">
            <option value="{{$city->state}}" class="dropdown-toggle">Select State</option>
            @foreach($states as $state)
                <option value="{{$state->id}}">{{$state->state}}</option>
            @endforeach
      </select>
     
</div>



       <div class="form-group">
        <label for="body">City:</label>
        <input type="text" name="city" class="form-control" value="{{$city->city}}" placeholder="Enter post title"/>
        
    </div>
    <div class="modal-footer form-group">
     
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" name="add" class="btn btn-primary">Update</button>
    </div>    
            
    </form>
</div>

{{-- @endif --}}
        </div>
    </div>
</div>


  
</section>


<script type="text/javascript">



$('#stateAdd').hide();
// $('#stateUpdate').hide();
// $('#stateDelete').hide();
function add(){
                 $('#stateAdd').show();
                   $('#stateUpdate').hide();
                   $('#stateDelete').hide();
                }

  function update(){
                 $('#stateAdd').hide();
                   $('#stateUpdate').show();
                   $('#stateDelete').hide();
                   
                }
                function remove(){
                 $('#stateAdd').hide();
                   $('#stateUpdate').hide();
                   $('#stateDelete').show();
                   
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
    
<script>
    // dropdown
    $(document).ready(function (){
        $('#country').on('change', function (){
            var countryId = this.value;
            $('#state').html('');
            $.ajax({
                url:'{{route('states')}}',
                type:'get',
                data:{'id' : countryId},
                datatType: 'json',
                error: function (res) {
                        console.log('AJAX call Failed');
                            },
                success:function(res){
                    $('#state').html('<option value="">Select State</option>');
                    $.each(res, function (key, value){
                        $('#state').append('<option value="' + value.id + '">' + value.state + '</option>');
                    });
                    // $('#city').html('<option value="">Select City</option>');
                }
            });
        });

        // state
        // $('#state').on('change', function (){
        //     var stateId = this.value;
        //     $('#city').html('');
        //     $.ajax({
        //         url:'{{route('cities')}}',
        //         type:'get',
        //         data:{'id' : stateId},
        //         datatType: 'json',
        //         error: function (res) {
        //                 console.log('AJAX call Failed');
        //                     },
        //         success:function(res){
        //             $('#city').html('<option value="">Select City</option>');
        //             $.each(res, function (key, value){
        //                 $('#city').append('<option value="' +value.id + '">' + value.city + '</option>');
        //             });
        //             $('#city').html('<option value="">Select City</option>');
        //         }
        //     });
        // });



    });
   
</script>
@endsection