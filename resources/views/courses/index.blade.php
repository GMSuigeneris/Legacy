@extends('layouts.admin')
@section('content')
        <div class="col-sm-9 mx-auto" style="margin-top:80px;">
            <div class="card mx-auto">
                <div class="card-header text-light" style="background-color:#000;">
                    <div class="row">
                        <div class="col-sm-9"> Courses </div>
                        <div class="col-sm-2 pull-right"><a class="btn btn-primary btn-sm pull-right" href="/courses/create">Create New</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($courses as $course)
                            <li class="list-group-item text-light"><a href="/courses/{{$course->id}}"><b>{{ $course->name }}</b> </a></li>
                        @endforeach
                    </ul>
                   {{$courses->links()}}
                </div>
            </div>
        </div>
      @endsection