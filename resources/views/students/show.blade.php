@extends('layouts.admin')
@section('content')

<div class="container" style="margin-top:80px;">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header" style="background-color:#000; color:#fff;">STUDENT PROFILE</div>

                <div class="card-body">
                  <img src="/{{$user->avatar}}" alt="User image" id="image">
                      <ul style="list-style:none; margin-left:25%;">
                        <li style="padding:3px; font-family:bold; border:2px solid black">Name: {{strToUpper($user->firstname)}} {{strToUpper($user->middlename)}} {{strToUpper($user->lastname)}} </li>
                        <li style="padding:3px; font-family:bold; border:2px solid black">Email: {{$user->email}}</li>
                        <li style="padding:3px; font-family:bold; border:2px solid black">Gender: {{$user->gender}} </li>
                        <li style="padding:3px; font-family:bold; border:2px solid black">Religion: {{$user->religion}}</li>
                        <li style="padding:3px; font-family:bold; border:2px solid black">Faculty:{{strToUpper($user->faculty->name)}}</li>
                        <li style="padding:3px; font-family:bold; border:2px solid black">Department:{{strToUpper($user->department->name)}}</li>
                         <li style="padding:3px; font-family:bold; border:2px solid black">Level:{{$user->level}}</li>
                        <li style="padding:3px; font-family:bold; border:2px solid black">Semester: {{$user->semester}} </li>
                        @if($status)
                        <li style="padding:3px; font-family:bold; border:2px solid black">Registration Status: {{$status}} </li>
                        @else
                        <li style="padding:3px; font-family:bold; border:2px solid black">Registration Status: Yet To Register </li>
                        @endif
                     </ul>  

                </div>
            </div>
        </div>

        <div class=" pull-right col-sm-3 col-md-3 col-lg-3">
            <div class="sidebar-module">
                <h4 style="color:#fff;">Actions</h4>
                <ol class="list-unstyled">
                    <li><a href="/students/create" >Enroll a new Student</a></li>
                    <li>
                    <a href="#" onclick="
                        var result = confirm('Are you sure you wish to delete this student?');
                        if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }">Delete
                    </a>
                        <form action="{{ route('students.destroy',[$user->id]) }}" method="POST" id="delete-form" style="display:none;">
                            @method('delete')
                            @csrf
                        </form>
                    </li>
                </ol>
            </div>
        </div> 
    </div>

@if($status=='Pending')
    <div class="row" style="margin-top:20px;">
    <div class="col-sm-7">
             <div class="card" style="background-color:#000; color:#fff;">
                <div class="card card-header">
                    Course Registration
                </div>
                <div class="card card-body" style="color:#b22222">
                    <ul style="list-style:none;">
                        @foreach($courseInfo as $course)
                            <li>{{$course->code}}-{{$course->name}}</li>
                        @endforeach
                    </ul>

                    <div class="form-group row">
                            <label for="reg" class="col-md-4 col-form-label">Registration Status: </label>
                            <div class="col-md-8">
                                <a href="/updateStat/{{$user->id}}" class="btn btn-small btn-primary" style="color:#fff;" role="button" id="stat">Approve</a>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endif
</div>
@endsection
