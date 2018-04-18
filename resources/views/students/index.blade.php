@extends('layouts.admin')
@section('content')
        <div class="col-sm-9 mx-auto" style="margin-top:80px;">
            <div class="card mx-auto">
                <div class="card-header text-light" style="background-color:#000;">
                    <div class="row">
                        <div class="col-sm-9"> Students </div>
                        <div class="col-sm-2 pull-right"><a class="btn btn-primary btn-sm pull-right" href="/students/create">Create New</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($users as $user)
                            <li class="list-group-item text-light"><a href="/students/{{$user->id}}"><b>{{ $user->firstname }} {{$user->lastname}}</b> </a></li>
                        @endforeach
                    </ul>
                    {{$users->links()}}
                </div>
            </div>
        </div>
      @endsection