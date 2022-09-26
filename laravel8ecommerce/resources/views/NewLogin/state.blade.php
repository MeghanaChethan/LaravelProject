@extends('NewLogin.main')

@section('content')

<section>
    <nav id="header-nav" style="background-color:rgba(173, 171, 167, 0.3);">
      
        <h4>States</h4>
        <div class="nav-links" >
         
            <ul>
                <li><button  onclick="add()"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="county-a" id="add"><i class="bi bi-plus"></i>Add </button></li>   
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
                        <th>State Name</th>
                        <th>Action</th>
                    </tr>
            </thead>
            <tbody id="utable">
                @if(!empty($states) && $states->count())
              @foreach ($states as $key=>$state)
              <tr>
                <td>{{$no++ }}</td>
                  <td>{{$state->state}}</td>
               
                 <td>
                     <div class="dropdown dropleft">
                      <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-dark">
                        <li><button onclick="update()" class="dropdown-item active" href="/state/edit/{{$state->id}}" id="editCountry" 
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
              {{-- <td colspan="10">There are no data.</td> --}}
              <td colspan="10"><img src="{{asset('iris/no-data.jpg')}}" alt="" width="600px;">
                <h1 style="text-align:center;">No Data Found </h1></td>

          </tr>

      @endif
           </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $states->links() !!}
        </div>
      </div>
    </div>

    {{-- Modal  --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header" style="background-color:aqua">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- Add --}}


 <div class="modal-body" id="stateAdd">
    
    <form action="{{route('state.add')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
           
                <label for="">Country:</label>
                <select name="country_key" id="country_key" class="form-control input-lg dynamic">
                    <option value="" class="dropdown-toggle">Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->country}}</option>
                    @endforeach
              </select>
             
        </div>

        <div class="form-group">
            <label for="">State:</label>
            <input type="text" class="form-control" name="state" required/>
          </div>
          <div class="modal-footer form-group">
           
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="add" class="btn btn-primary">Submit</button>
          </div>
      </form>
</div>

@if(!empty($states) && $states->count())
<div class="modal-body" id="stateUpdate">

  <form action="{{route('state.update')}}" method="POST">
      {{csrf_field()}}
      
      <input type="text" name="id" class="form-control" value="{{$state->id}}" placeholder="Enter post title"/>

      <div class="form-group">
           
        <label for="">Country:</label>
        <select name="country_key" id="country_key" class="form-control input-lg dynamic">
            <option value="" class="dropdown-toggle">Select Country</option>
            @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->country}}</option>
            @endforeach
      </select>
     
</div>



       <div class="form-group">
        <label for="body">State:</label>
        <input type="text" name="state" class="form-control" value="{{$state->state}}" placeholder="Enter post title"/>
        
    </div>
    <div class="modal-footer form-group">
     
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" name="add" class="btn btn-primary">Update</button>
    </div>    
            
    </form>
</div>


{{-- delete --}}
<div class="modal-body" id="stateDelete">
         
  Are you want to Delete?

  <form action="{{url('/state/delete/'.$state->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <div class="modal-footer form-group">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" name="delete" class="btn btn-primary">Delete</button>
    </div>
  </form>

</div>
@endif
        </div>
    </div>
</div>




</section>


<script type="text/javascript">

$('#stateAdd').hide();
$('#stateUpdate').hide();
$('#stateDelete').hide();
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
@endsection