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

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

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
 .county-a{
     background-color: rgba(11, 34, 241, 0.938);
    color:white;
    border:none;
    border-radius:5px;
    padding-left:15px;
    padding-right:15px;
    padding-top:8px;
    padding-bottom:8px;

    margin-top: 4px;
    margin-bottom: -10px;
    cursor: pointer;
}

.nav-links ul li:hover::after{
  width: 100%;
}

.footer {  
    /* position: fixed;  */

   padding: 10px;
    background-color: rgb(190, 175, 175);
  
}

.row-country{
    margin:20px;
    padding:10px;
    border:1px solid black;
}
td .action-button{
    border:none;
    background-color: white;
    font-size: 25px;
}

.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}
.nodata{
    /* text-align: center;
  
    display: grid;
      justify-content: center; */
}
.nodata{
  
    background: url(images/bg.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
#footer{
    /* margin-top: 489px; */
    position:absolute;
    bottom:0;
    width:100%;
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

        @yield('content')
  
    
<section class="footer" id="footer">
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


</body>






</html>