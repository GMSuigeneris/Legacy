@extends('layouts.admin')
@section('content')

<div class="container" style="margin-top:30px;">
<h5 class="text-light"> Faculty: {{$department->faculty->name}}</h5>
<h5 class="text-light">Department: {{$department->name}}</h5>
    <div class="row">
        <div class="pull-left col-md-9 col-lg-9">
            <div class="card">
                <div class="card card-header text-light" style="background-color:#000;">COURSES</div>
                @if(count($department->courses) > 0) 
                <div class="card card-body" id="departments" style="padding:10px; margin:5px;">
                    <ul class="list-group">
                        @foreach($department->courses as $course)
                            <li class="list-group-item text-light"><a href="/courses/{{$course->id}}"><b>{{ $course->code }}</b> - <b>{{ $course->name }}</b> </a></li>
                        @endforeach
                    </ul>
                </div>
            @elseif(count($department->courses) == 0) 
           <div class="card card-body" id="departments" style="padding:10px; margin:5px;">
                <h5  style="padding:10px;">Courses</h5>
                <p>No courses has been created</p>
                <a href="/courses/create/{{$department->id}}" class="btn btn-primary" role="button">Create a course>>></a>   
            </div>
            @endif
            </div>
        </div>

        <div class=" pull-right col-sm-3 col-md-3 col-lg-3">
            <div class="sidebar-module">
                <h4 style="color:#fff;">Actions</h4>
                <ol class="list-unstyled">
                    <li><a href="/courses/create/{{$department->id}}">Add course</a></li>
                    <li><a href="/departments/create" >Create New Department</a></li>
                    <li><a href="/departments/{{$department->id}}/edit">Edit Department</a></li>
                    <li>
                    <a href="#" onclick="
                        var result = confirm('Are you sure you wish to delete this department?');
                        if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }">Delete
                    </a>
                        <form action="{{ route('departments.destroy',[$department->id]) }}" method="POST" id="delete-form" style="display:none;">
                            @method('delete')
                            @csrf
                        </form>
                    </li>
                </ol>
            </div>
        </div> 
    </div>

     <div class="row" style="margin-top:20px;">
        <div class="pull-left col-md-9 col-lg-9">
            <div class="card">
                <div class="card card-header text-light" style="background-color:#000;">STUDENTS</div>
                @if(count($department->users) > 0) 
                <div class="card card-body" id="departments" style="padding:10px; margin:5px;">
                    <ul class="list-group">
                        @foreach($department->users as $user)
                            <li class="list-group-item text-light"><a href="/users/{{$user->id}}"><b>{{ $user->firstname }} {{ $user->lastname }}</b> </a></li>
                        @endforeach
                    </ul>
                </div>
            @elseif(count($department->users) == 0) 
           <div class="card card-body" id="departments" style="padding:10px; margin:5px;">
                <h5  style="padding:10px;">STUDENTS</h5>
                <p>No Student has been enrolled</p>
                <a href="/users/create/{{$department->id}}" class="btn btn-primary" role="button">Enroll a student>>></a>   
            </div>
            @endif
            </div>
        </div> 
</div>
@endsection