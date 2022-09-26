@extends('NewLogin.main')

@section('content')
<section class="header">
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
    
           <div class="row-country">
                <table class="table" id="userTable">
                    <thead>
                            <tr>
                                <th>#</th>
                                <th>County Name</th>
                                <th>Country Code</th>
                                <th>Action</th>
                            </tr>
                    </thead>
                    <tbody id="utable">
                      @if(!empty($country) && $country->count())
                    @foreach ($country as $key=>$country1)
                    <tr>
                      <td>{{$no++ }}</td>
                        <td>{{$country1->country}}</td>
                        <td>{{$country1->code}}</td>
                       <td>
                           <div class="dropdown dropleft">
                            <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                              <li><button onclick="update()" class="dropdown-item active" href="/country/edit/{{$country1->id}}" id="editCountry" 
                                data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button></li>
                                <li><button onclick="remove()" class="dropdown-item" 
                                  data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button></li>
                              {{-- <li><button onclick="remove()" class="dropdown-item" href="/country/delete/{{$country1->id}}"
                              >Delete</button></li> --}}
                              {{-- <form action="{{url('/country/delete/'.$country1->id)}}" method="POST">
                                @csrf
                            @method('DELETE')
                           <li><button onclick="remove()" class="dropdown-item" 
                              >Delete</button></li>
                              </form> --}}
                            </ul>
                          </div>
                       <td>
                   </tr>
                @endforeach
                @else

                <tr>
                    {{-- <td colspan="10">There are no data.</td> --}}
                    <td colspan="10"><img src="{{asset('iris/no-data.jpg')}}" alt="" width="600px;">
                      <h1 style="text-align:center;">No Data Found </h1></td>

                </tr>

            @endif
                 </tbody>
                </table>
                     {{-- Pagination --}}
        <div class="d-flex justify-content-center">
          {!! $country->links() !!}
      </div>
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



        @if(!empty($country) && $country->count())
      <div class="modal-body" id="countryUpdate">
  
        <form action="{{route('country.update')}}" method="POST">
            {{csrf_field()}}
            
            {{-- <input type="hidden" name="country_id" value="{{$country->country_id}}"> --}}
            <div class="form-group">
              <label for="id">Country id:</label>
              <input type="text" name="id" class="form-control" value="{{$country1->id}}" placeholder="Enter post title"/>
          </div>
                     <div class="form-group">
                         <label for="title">Country Name:</label>
                         <input type="text" name="country" class="form-control" value="{{$country1->country}}" placeholder="Enter post title"/>
                     </div>
                     <div class="form-group">
                      <label for="body">Country Code:</label>
                      <input type="text" name="code" class="form-control" value="{{$country1->code}}" placeholder="Enter post title"/>
                      
                  </div>
                  <div class="modal-footer form-group">
                   
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="add" class="btn btn-primary">Update</button>
                  </div>
          </form>
    </div>
    @endif
      
    <div class="modal-body" id="countryDelete">
         
                Are you want to Delete?

                <form action="{{url('/country/delete/'.$country1->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <div class="modal-footer form-group">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="delete" class="btn btn-primary">Delete</button>
                  </div>
                </form>
       
  </div>
  


      
    </div>
  </div>
</div>


</section>


    <script type="text/javascript">
   
    $('#countryAdd').hide();
    $('#countryUpdate').hide();
    $('#countryDelete').hide();
    function add(){
                     $('#countryAdd').show();
                       $('#countryUpdate').hide();
                       $('#countryDelete').hide();
                    }

      function update(){
                     $('#countryAdd').hide();
                       $('#countryUpdate').show();
                       $('#countryDelete').hide();
                    }
                    function remove(){
                     $('#countryAdd').hide();
                       $('#countryUpdate').hide();
                       $('#countryDelete').show();
                       
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