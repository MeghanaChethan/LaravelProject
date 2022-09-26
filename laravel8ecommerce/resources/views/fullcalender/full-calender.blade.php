
<!DOCTYPE html>
<html>
<head>
    <title>How to Use Fullcalendar in Laravel 8</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    {{-- toaster --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>
<body>
  
<div class="container">
    <br />
    <h1 class="text-center text-primary"><u>How to Use Fullcalendar in Laravel 8</u></h1>
    <br />
    <div id="calendar"></div>
</div>


    <div class="container" id="formContainer">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    All Posts 
                    </div>
             
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="userTable">
                        <thead>
                                <tr>
                                    <th>title</th>
                                    <th>start</th>
                                    <th>end</th>
                          
                                </tr>
                        </thead>
                        <tbody id="utable">
                        {{-- @foreach($data as $datas)
                       
                       <tr>
                           <td>{{$datas->title}}</td>
                           <td>{{$datas->start}}</td>
                           <td>{{$datas->end}}</td>

                       </tr>
                       @endforeach --}}
                     </tbody>
                
                    </table>
            </div>
            </div>
            </div>
         </div> 
     </div>
     </div>
 </section> 

                {{---------------  --}}

                <section>
                    <div class="container" id="addForm">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <form action="" method="POST" id="studentForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter post title"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="start">Start</label>
                                        <input type="text" name="start" id="start" class="form-control" placeholder="Enter Start"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="end">End</label>
                                        <input type="text" name="end" id="end" class="form-control" placeholder="Enter post title"/>
                                    </div>
                                    <input type="submit" value="Add Post" />
                                </form>
                            </div>
                        </div>
                    </div> 
                 </section>
   
<script>




$(document).ready(function () {
    $('#formContainer').hide();

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        events:'/full-calender',
        selectable:true,
        selectHelper: true,
        select:function(start, end, allDay)
        {
           
         
            
            var title = prompt('Event Title:');

            if(title)
            {
                var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                $.ajax({
                    url:"/full-calender/action",
                    type:"POST",
                    data:{
                        title: title,
                        start: start,
                        end: end,
                        type: 'add'
                    },
                    success:function(data)
                    {
                        calendar.fullCalendar('refetchEvents');
                        // alert("Event Created Successfully");
                        displayMessage("Event Created Successfully");
                    }
                })
            }
        },
        editable:true,
        eventResize: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"/full-calender/action",
                type:"POST",
                data:{
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    // alert("Event Updated Successfully");
                    displayMessage("Event Updated Successfully");
                }
            })
        },
        eventDrop: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"/full-calender/action",
                type:"POST",
                data:{
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    // alert("Event Updated Successfully");
                    displayMessage("Event Updated Successfully");

                }
            })
        },

        eventClick:function(event)
        {
            if(confirm("Are you sure you want to remove it?"))
            {
                var id = event.id;
                $.ajax({
                    url:"/full-calender/action",
                    type:"POST",
                    data:{
                        id:id,
                        type:"delete"
                    },
                    success:function(response)
                    {
                        calendar.fullCalendar('refetchEvents');
                        // alert("Event Deleted Successfully");
                        displayMessage("Event Deleted Successfully");
                    }
                })
            }
        }

        // eventClick:function(event)
        // {
            
        //         var id = event.id;
        //         $.ajax({
        //             url:"/full-calender/action",
        //             type:"POST",
        //             data:{
        //                 id:id,
        //                 type:"view"
        //             },
        //             success:function(response)
        //             {
        //                 calendar.fullCalendar('refetchEvents');
        //                 $('#calendar').hide();
        //                 var len = 0;
        //                 $('#userTable tbody').empty(); // Empty <tbody>
        //                 if(response['data'] != null){
        //                     var id = response['data'].id;
        //                   var title = response['data'].title;
        //                 var start = response['data'].start;
        //                 var end = response['data'].end;
        //                 var created_at = response['data'].created_at;
        //                 var updated_at = response['data'].updated_at;


        //                 var tr_str = "<tr>" +
        //            "<td align='center'>" + id + "</td>" +
        //            "<td align='center'>" + title + "</td>" +
        //            "<td align='center'>" + start + "</td>" +
        //            "<td align='center'>" + end + "</td>" +
        //            "<td align='center'>" + created_at + "</td>" +
        //            "<td align='center'>" + updated_at + "</td>" +
        //          "</tr>";

        //        console.log(tr_str);
        //        $("#utable").append(tr_str);
        //                 }
                        
                       
                      
        //             }
                  
        //         })
               
        // }


      

    });

});

//Toastr success code
function displayMessage(message) {

toastr.success(message, 'Event');

} 
  



// ------------------------------------------------------



// $(document).ready(function () {
//     $('#formContainer').hide();

//     $.ajaxSetup({
//         headers:{
//             'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//     var calendar = $('#calendar').fullCalendar({
//         editable:true,
//         header:{
//             left:'prev,next today',
//             center:'title',
//             right:'month,agendaWeek,agendaDay'
//         },
//         events:'/full-calender',
//         selectable:true,
//         selectHelper: true,
//         select:function(start, end, allDay)
//         {
           
//             var title = prompt('Event Title:');

//             if(title)
//             {
//                 var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

//                 var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

//                 $.ajax({
//                     url:"/full-calender/action",
//                     type:"POST",
//                     data:{
//                         title: title,
//                         start: start,
//                         end: end,
//                         type: 'add'
//                     },
//                     success:function(data)
//                     {
//                         calendar.fullCalendar('refetchEvents');
//                         // alert("Event Created Successfully");
//                         displayMessage("Event Created Successfully");
//                     }
//                 })
//             }
//         },
//         editable:true,
//         eventResize: function(event, delta)
//         {
//             var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
//             var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
//             var title = event.title;
//             var id = event.id;
//             $.ajax({
//                 url:"/full-calender/action",
//                 type:"POST",
//                 data:{
//                     title: title,
//                     start: start,
//                     end: end,
//                     id: id,
//                     type: 'update'
//                 },
//                 success:function(response)
//                 {
//                     calendar.fullCalendar('refetchEvents');
//                     // alert("Event Updated Successfully");
//                     displayMessage("Event Updated Successfully");
//                 }
//             })
//         },
//         eventDrop: function(event, delta)
//         {
//             var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
//             var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
//             var title = event.title;
//             var id = event.id;
//             $.ajax({
//                 url:"/full-calender/action",
//                 type:"POST",
//                 data:{
//                     title: title,
//                     start: start,
//                     end: end,
//                     id: id,
//                     type: 'update'
//                 },
//                 success:function(response)
//                 {
//                     calendar.fullCalendar('refetchEvents');
//                     // alert("Event Updated Successfully");
//                     displayMessage("Event Updated Successfully");

//                 }
//             })
//         },

//         eventClick:function(event)
//         {
//             if(confirm("Are you sure you want to remove it?"))
//             {
//                 var id = event.id;
//                 $.ajax({
//                     url:"/full-calender/action",
//                     type:"POST",
//                     data:{
//                         id:id,
//                         type:"delete"
//                     },
//                     success:function(response)
//                     {
//                         calendar.fullCalendar('refetchEvents');
//                         // alert("Event Deleted Successfully");
//                         displayMessage("Event Deleted Successfully");
//                     }
//                 })
//             }
//         }

//         // eventClick:function(event)
//         // {
            
//         //         var id = event.id;
//         //         $.ajax({
//         //             url:"/full-calender/action",
//         //             type:"POST",
//         //             data:{
//         //                 id:id,
//         //                 type:"view"
//         //             },
//         //             success:function(response)
//         //             {
//         //                 calendar.fullCalendar('refetchEvents');
//         //                 $('#calendar').hide();
//         //                 var len = 0;
//         //                 $('#userTable tbody').empty(); // Empty <tbody>
//         //                 if(response['data'] != null){
//         //                     var id = response['data'].id;
//         //                   var title = response['data'].title;
//         //                 var start = response['data'].start;
//         //                 var end = response['data'].end;
//         //                 var created_at = response['data'].created_at;
//         //                 var updated_at = response['data'].updated_at;


//         //                 var tr_str = "<tr>" +
//         //            "<td align='center'>" + id + "</td>" +
//         //            "<td align='center'>" + title + "</td>" +
//         //            "<td align='center'>" + start + "</td>" +
//         //            "<td align='center'>" + end + "</td>" +
//         //            "<td align='center'>" + created_at + "</td>" +
//         //            "<td align='center'>" + updated_at + "</td>" +
//         //          "</tr>";

//         //        console.log(tr_str);
//         //        $("#utable").append(tr_str);
//         //                 }
                        
                       
                      
//         //             }
                  
//         //         })
               
//         // }


      

//     });

// });

// //Toastr success code
// function displayMessage(message) {

// toastr.success(message, 'Event');

// } 
  
</script>
  
</body>
</html>
