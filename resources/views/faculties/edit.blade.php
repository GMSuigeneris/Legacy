@extends('layouts.admin')
@section('content')

<div class="container" style="margin-top:80px;">
    <div class="row">
        <div class="col-md-9 col-lg-9 pull-left">
            <div class="card"  style="margin-top:20px;">
                <div class="card card-header text-light" style="background-color:#000;">Update faculty</div>
                <div class="card card-body">
                    <form action="{{ route('faculties.update',[$faculty->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="faculty-name"  style="background-color:#000; color:#fff; padding:5px;">Name<span class="required">*</span></label>
                            <input placeholder="Enter Name" class="form-control" required id="faculty-name" name="name" spellcheck="false" value="{{$faculty->name}}">
                        </div>

                        <div class="form_group">
                            <input type="submit" class="btn btn-primary" value="Update"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
        <div class="sidebar-module">
            <h4 style="color:#fff; margin-top:20px;">Actions</h4>
            <ol class="list-unstyled">
                <li><a href="/faculties/{{$faculty->id}}"><b>View faculty Details</b></a></li>
            </ol>
        </div>
    </div>

    </div>
</div>
 @endsection