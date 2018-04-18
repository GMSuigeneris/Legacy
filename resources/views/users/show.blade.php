<!DOCTYPE html>
<html lang="en">
<head>
        <title>STUDENT PROFILE</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{asset('css/backend/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{asset('css/backend/bootstrap-responsive.min.css') }}" />
        <link href="{{asset('fonts/backend/css/font-awesome.css') }}" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
         <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       <link rel="stylesheet" href="css/main.css">
    <style>
        body{
            background:#2E363F;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .links > a {
            color: #fff;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
    </head>
    <body>
 <div class="flex-center position-ref">
        <div class="top-right links">
            <a href="/admin">Dashboard</a>
            <a href="/faculties">Faculties</a>
            <a href="/departments">Departments</a>
            <a href="/students">Students</a>
            <a href="/courses">Courses</a>
            <a href="#">Logout</a>
        </div>
</div>

<div class="container" style="margin-top:80px;">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header" style="background-color:#000; color:#fff;">STUDENT PROFILE</div>

                <div class="card-body">
                  <img src="{{$users->avatar}}" alt="User image" id="image"> 
                      <ul style="list-style:none; margin-left:15%;">
                        <li style="padding:3px; font-family:bold; border:2px solid black">Name: {{strToUpper($users->firstname)}} {{strToUpper($users->middlename)}} {{strToUpper($users->lastname)}} </li>
                        <li style="padding:3px; font-family:bold; border:2px solid black">Email: {{$users->email}}</li>
                        <li style="padding:3px; font-family:bold; border:2px solid black">Gender: {{$users->gender}} </li>
                        <li style="padding:3px; font-family:bold; border:2px solid black">Religion: {{$users->religion}}</li>
                        <li style="padding:3px; font-family:bold; border:2px solid black">Faculty:{{strToUpper($users->faculty->name)}}</li>
                        <li style="padding:3px; font-family:bold; border:2px solid black">Department:{{strToUpper($users->department->name)}}</li>
                         <li style="padding:3px; font-family:bold; border:2px solid black">Level:{{$users->level}}</li>
                        <li style="padding:3px; font-family:bold; border:2px solid black">Semester: {{$users->semester}} </li>
                     </ul>  

                </div>
            </div>
        </div>

        <div class=" pull-right col-sm-3 col-md-3 col-lg-3">
            <div class="sidebar-module">
                <h4 style="color:#fff;">Actions</h4>
                <ol class="list-unstyled">
                    <li><a href="/students/edit/{{$users->id}}">Approve Course Registration</a></li>
                    <li><a href="/students/create" >Enroll a new Student</a></li>
                    <li>
                    <a href="#" onclick="
                        var result = confirm('Are you sure you wish to delete this student?');
                        if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }">Delete
                    </a>
                        <form action="{{ route('students.destroy',[$users->id]) }}" method="POST" id="delete-form" style="display:none;">
                            @method('delete')
                            @csrf
                        </form>
                    </li>
                </ol>
            </div>
        </div> 
    </div>
</div>

  <script src="{{asset('js/backend/jquery.min.js')}}"></script>  
 <script src="{{asset('js/backend/matrix.login.js')}}"></script> 
    </body>
</html>
