<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Login System in laravel</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<style type="text/css">
   
   *{
    margin: 0;
    padding: 0;
    font-family: 'Open Sans', sans-serif;
}
body{
    min-height: 100vh;
    /* width: 100%; */
    width: 100%;

}
.header{
    /* min-height: 100vh;
    width: 100%;
    */
    position: relative;
}
#header-nav{
    display: flex;
    /* padding: 1% 4%; */
    justify-content: space-between;
    align-items: center;
    background-color: rgb(24, 23, 21);
    
}
#header-nav img{
    width: 150px;
}
.nav-links{
    flex: 1;
    text-align: right;
}
.nav-links ul li{
    list-style: none;
    display: inline-block;
    padding: 8px 12px;
    position: relative;
   
}
.nav-links ul li a{
   
    color: white;
    text-decoration: none;
    font-size: 16px;
    
}

.nav-links ul li::after{
    content: '';
    width: 0%;
    height: 2px;
    background:#f44336 ;
    display: block;
    margin: auto;
    transition: 0.5s;
}
.nav-links ul li:hover::after{
  width: 100%;
}

.footer {   
   padding: 10px;
    background-color: rgb(190, 175, 175);
  
}
.row_main{
    display:flex;
}

#main-nav{
    margin-top:200px;
    width:300px;
    font-size:25px;
    margin-bottom:230px;
    text-align: center;
  
}
#main-nav ul img{
 height:40px;
}

#main-nav ul li{
    list-style: none;
    line-height: 2.6;
    border-right: 3px solid rgb(102, 99, 99);
    
}
#main-nav ul li button{
border:none;
background-color: white;
color:rgb(68, 68, 168);

    /* text-decoration: none; */
}

.button-general{
    text-align: center;
  cursor: pointer;
  font-size:20px;
  
}

/* button for genreal */
.col2_general_button{
            margin-top: 30px;
            margin-left: 25px;
           
}

.button-general {
    position: relative;
    /* background-color: #f39c12; */
    border: none;
    padding: 6px;
    width: 150px;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    box-shadow:0px 2px 10px 5px #97B1BF;
    border-radius: 8px;
    margin-top: 10px;
    margin-right: 10px;
}

.button-general:hover{
   background:#fff;
   box-shadow:0px 2px 10px 5px #97B1BF;
   color:#000;
}

.button-general:after {
    content: "";
    background: #f1c40f;
    display: block;
    position: absolute;
    padding-top: 300%;
    padding-left: 350%;
    margin-left: -20px !important;
    margin-top: -120%;
    opacity: 0;
    transition: all 0.8s
}

.button-general:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
}
</style>
</head>

<body>
    <section class="header">
        <nav id="header-nav">
            @if(isset(Auth::user()->email))
            <a href=""><img src="{{asset('assets/images/brands/apple-store.png')}}" alt=""></a>
            <div class="nav-links" id="navLinks">
             
                <ul>
                    <li><a href="index.html">Welcome {{Auth::user()->email}}</a></li>   
                    <li><a href="index.html">HOME</a></li>
                   
                    <li><a href="{{url('/main/logout')}}">Logout</a></li>
                </ul>
                @endif
            </div>
        </nav>
   
    </section>

    <section class="main">
        <div class="container_main">
            <div class="row_main">
                <div class="col1">
                   <nav id="main-nav">
                    <div>
             
                        <ul>
                            <img src="{{asset('iris/iris1.png')}}"  alt="">
                            <li><button onclick="general()" id="general">General</button></li>   
                            <li><button onclick="pms()">PMS</button></li>
                           
                            <li><button href="">SMA</button></li>
                            <li><button href="">Alerts</button></li>

                            <li><a href="{{url('/main/logout')}}"><img src="{{asset('iris/logout.png')}}" alt=""></a></li>
                            <img src="{{asset('iris/m2nxt.png')}}"  alt="">
                        </ul>
                        
                    </div>
                   </nav>
                </div>
               
                {{-- general --}}
            <div class="col secondPart" id="generalButton" >
                <div class="col2_general_button" id="button_genreal">
                    <h5>Location masters</h5>
                    <button class="button-general" onclick="window.location='{{ URL::route('index') }}'">Countries</button>
                    <button class="button-general" onclick="window.location='{{ URL::route('state.index') }}'">States</button>
                    <button class="button-general" onclick="window.location='{{ URL::route('city.index') }}'">Cities</button>
                    <button class="button-general">Reg.offices</button>
                   
                </div>
                <div class="col2_general_button">
                    <h5>Administrative masters</h5>
                    <button class="button-general">Customer</button>
                    <button class="button-general">Plants</button>
                    <button class="button-general">Cells</button>
                    <button class="button-general">Shifts</button>
                    <button class="button-general">Machines</button>
                    <button class="button-general">Users</button>
                    <button class="button-general">Popup</button>
                    <button class="button-general">UOM</button>
                </div>
            </div>

            {{-- pms --}}

            <div class="col secondPart" id="pmsButton" >
                <div class="col2_general_button" id="button_pms">
                    <h5>pms masters</h5>
                    <button class="button-general">Customer</button>
                    <button class="button-general">Plants</button>
                    <button class="button-general">Cells</button>
                    <button class="button-general">Shifts</button>
                    <button class="button-general">Machines</button>
                    <button class="button-general">Users</button>
                    <button class="button-general">Popup</button>
                    <button class="button-general">UOM</button>
                </div>
                <div class="col2_general_button">
                    <h5>pms masters</h5>
                    <button class="button-general">Customer</button>
                    <button class="button-general">Plants</button>
                    <button class="button-general">Cells</button>
                    <button class="button-general">Shifts</button>
                    <button class="button-general">Machines</button>
                    <button class="button-general">Users</button>
                    <button class="button-general">Popup</button>
                    <button class="button-general">UOM</button>
                </div>
            </div>
               
            </div>
        </div>

       

    </section>
  
    
<section class="footer">
     <div class="row">
         <div class="col">
             Copyright &copy; 2022-2023 Meghana.All rights reserved
         </div>
         <div class="col">
            <i class="bi bi-facebook" style="font-size: 1rem; color:blue; cursor:pointer"></i>
            <i class="bi bi-linkedin" style="font-size: 1rem; color:blue; cursor:pointer"></i>
            <i class="bi bi-youtube" style="font-size: 1rem; color:blue; cursor:pointer"></i>
            </div>
     </div>
</section>


<script type="text/javascript">
    //   $("#generalButton").hide();
      $("#pmsButton").hide();

      function general(){
                        var x = document.getElementById("generalButton");
                        $("#pmsButton").hide();
                        $("#generalButton").show();
                       
                    }

      function pms(){
                        var x = document.getElementById("pmsButton");

                        if (x.style.display === "none") {
                        $("#generalButton").hide();
                        x.style.display = "block";
                        } else {
                                $("#pmsButton").show();
                                //  x.style.display = "none";
                                }
                    }
</script>

</body>






{{-- <body>
    <br>
    <div class="container box">
        <h3 align="center">Simple Login System in Laravel</h3>
        <br>

      
        @if(isset(Auth::user()->email))
        <div class="alert alert-danger success-block">  
            <strong>Welcome {{Auth::user()->email}}</strong>
            <br>
            <a href="{{url('/main/logout')}}">Logout</a>
        </div>
        {{-- remove the else block it shows eror 
        else
          <script>window.location="/main";</script>  
        @endif
       <br>
    </div>
</body> --}}
</html>