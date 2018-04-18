@extends('layouts.admin')
@section('content')

<div class="container" style="margin-top:30px;">
<div class="row">
<div class="col-sm-9">
    <h5 class="text-light"> Faculty: {{$course->faculty->name}}</h5>
    <h5 class="text-light">Department: {{$course->department->name}}</h5>
    <h5 class="text-light"> Course: {{$course->name}}</h5>
    <h5 class="text-light"> Course Code: {{$course->code}}</h5>
    <h5 class="text-light">Level: {{$course->level}}</h5>
    <h5 class="text-light"> Semester: {{$course->semester}}</h5>
</div>

    

        <div class=" pull-right col-sm-3 col-md-3 col-lg-3">
            <div class="sidebar-module">
                <h5 style="color:#fff;">Actions</h5>
                <ol class="list-unstyled">
                    <li><a href="/courses/create/{{$course->id}}">Add Course</a></li>
                    <li><a href="/courses/{{$course->id}}/edit">Edit Course</a></li>
                    <li>
                    <a href="#" onclick="
                        var result = confirm('Are you sure you wish to delete this course?');
                        if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }">Delete
                    </a>
                        <form action="{{ route('courses.destroy',[$course->id]) }}" method="POST" id="delete-form" style="display:none;">
                           @method('delete')
                            @csrf
                        </form>
                    </li>
                </ol>
            </div>
        </div> 
    </div>
</div>
@endsection
