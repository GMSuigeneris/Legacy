@extends('layouts.admin')
@section('content')

<div class="container" style="margin-top:40px;">
<h4 class="text-light">{{$faculty->name}}</h4>
    <div class="row">
        <div class="pull-left col-md-9 col-lg-9">
            <div class="card">
                <div class="card card-header text-light" style="background-color:#000;">List of Departments</div>
                @if(count($faculty->departments) > 0) 
                <div class="card card-body" id="departments" style="padding:10px; margin:5px;">
                    <ul class="list-group">
                        @foreach($faculty->departments as $department)
                            <li class="list-group-item text-light"><a href="/departments/{{$department->id}}"><b>{{ $department->name }}</b> </a></li>
                        @endforeach
                    </ul>
                </div>
            @elseif(count($faculty->departments) == 0) 
           <div class="card card-body" id="departments" style="padding:10px; margin:5px;">
                <p>No department has been created</p>
                <a href="/departments/create/{{$faculty->id}}" class="btn btn-primary" role="button">Create a department>>></a>   
            </div>
            @endif
            </div>
        </div>

        <div class=" pull-right col-sm-3 col-md-3 col-lg-3">
            <div class="sidebar-module">
                <h4 style="color:#fff;">Actions</h4>
                <ol class="list-unstyled">
                    <li><a href="/departments/create/{{$faculty->id}}">Add department</a></li>
                    <li><a href="/faculties/create" >Create New faculty</a></li>
                    <li><a href="/faculties/{{$faculty->id}}/edit">Edit Faculty</a></li>
                    <li>
                    <a href="#" onclick="
                        var result = confirm('Are you sure you wish to delete this faculty?');
                        if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }">Delete
                    </a>
                        <form action="{{ route('faculties.destroy',[$faculty->id]) }}" method="POST" id="delete-form" style="display:none;">
                            <input type="hidden" name="_method" value="delete">
                            @csrf
                        </form>
                    </li>
                </ol>
            </div>
        </div> 

    </div>

    <div class="row" style="margin-top:10px;">
        <div class="pull-left col-md-9 col-lg-9">
            <div class="card">
                <div class="card card-header text-light" style="background-color:#000;">Courses Offered in the Faculty</div>
                @if(count($faculty->courses) > 0) 
                <div class="card card-body" id="departments" style="padding:10px; margin:5px;">
                    <ul class="list-group">
                        @foreach($faculty->courses as $course)
                            <li class="list-group-item text-light"><a href="/courses/{{$course->id}}">{{$course->code}} - <b>{{ $course->name }}</b> </a></li>
                        @endforeach
                    </ul>
                </div>
            @elseif(count($faculty->courses) == 0) 
           <div class="card card-body" id="departments" style="padding:10px; margin:5px;">
                <p>No courses has been created</p>
                <a href="/courses/create/{{$faculty->id}}" class="btn btn-primary" role="button">Create a course>>></a>   
            </div>
            @endif
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:10px;">
        <div class="pull-left col-md-9 col-lg-9">
            <div class="card">
                <div class="card card-header text-light" style="background-color:#000;">List of Students in the Faculty</div>
                @if(count($faculty->users) > 0) 
                <div class="card card-body" id="departments" style="padding:10px; margin:5px;">
                    <ul class="list-group">
                        @foreach($faculty->users as $user)
                            <li class="list-group-item text-light"><a href="/users/{{$user->id}}"><b>{{$user->firstname}} {{ $user->lastname }}</b> </a></li>
                        @endforeach
                    </ul>
                </div>
            @elseif(count($faculty->users) == 0) 
           <div class="card card-body" id="departments" style="padding:10px; margin:5px;">
                <p>No Students has been enrolled in this faculty</p>
                <a href="/users/create/{{$faculty->id}}" class="btn btn-primary" role="button">Enroll a student>>></a>   
            </div>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
