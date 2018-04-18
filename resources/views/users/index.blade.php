@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header" style="background-color:#000; color:#fff;">DASHBOARD</div>

                <div class="card-body">
                   <div class="row">
                    <div class="col-sm-2">
                         <img src="storage/cover_images/{{Auth::user()->avatar}}" alt="User image" id="image">
                         <br><br>
                         <a href="/users/{{Auth::user()->id}}/edit"><button class="btn btn-danger btn-sm">Edit Profile</button></a>
                    </div>
                     <div class="col-sm-9">
                        
                    <ul style="list-style:none;">
                        <li class="profile">Name: {{Auth::user()->firstname}} {{Auth::user()->middlename}} {{Auth::user()->lastname}} </li>
                        <li class="profile">Email: {{Auth::user()->email}}</li>
                        <li class="profile">Gender: {{Auth::user()->gender}} </li>
                        <li class="profile">Religion: {{Auth::user()->religion}}</li>
                        <li class="profile">Faculty:{{Auth::user()->faculty->name}}</li>
                        <li class="profile">Department:{{Auth::user()->department->name}}</li>
                         <li class="profile">Level:{{Auth::user()->level}}</li>
                        <li class="profile">Semester: {{Auth::user()->semester}} </li>
                     </ul>
                     </div>
                  </div>

                </div>
            </div>
        </div>

        @if(count($courseInfo) > 0)
        <div class="col-sm-5">
             <div class="card" style="background-color:#000; color:#fff;">
                <div class="card card-header">
                    Courses Offered
                </div>
                <div class="card card-body" style="color:#b22222">
                    <ul style="list-style:none;">
                        @foreach($courseInfo as $course)
                        <li>{{$course->code}}-{{$course->name}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card card-footer">Registration Status: {{$status}}</div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection