@extends('layouts.admin')
@section('content')
        <div class="col-sm-9 mx-auto" style="margin-top:40px;">
            <div class="card mx-auto">
                <div class="card-header text-light" style="background-color:#000;">
                    <div class="row">
                        <div class="col-sm-9"> Departments </div>
                        <div class="col-sm-2 pull-right"><a class="btn btn-primary btn-sm pull-right" href="/departments/create">Create New</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($departments as $department)
                            <li class="list-group-item text-light"><a href="/departments/{{$department->id}}"><b>{{ $department->name }}</b> </a></li>
                        @endforeach
                    </ul>
                    {{$departments->links()}}
                </div>
            </div>
        </div>
@endsection