@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 col-lg-9 pull-left">
            <div class="card"  style="margin-top:30px;">
                <div class="card card-header text-light" style="background-color:#000;">Update faculty</div>
                <div class="card card-body">
                    <form action="{{ route('courses.update',[$course->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                         
                             <div class="form-group">
                                <label for="faculty" style="background-color:#000; color:#fff; padding:5px;">Faculty<span class="required">*</span></label>
                               <select name="faculty" class="form-control">
                                    <option value="{{$course->faculty->id}}">{{$course->faculty->name}}</option>
                                </select>
                            </div>
                               <div class="form-group">
                                <label for="department" style="background-color:#000; color:#fff; padding:5px;">Department<span class="required">*</span></label>
                               <select name="department" class="form-control">
                                    <option value="{{$course->department->id}}">{{$course->department->name}}</option>
                                </select>
                            </div>
                         

                        
                      

                            <div class="form-group">
                                <label for="name" style="background-color:#000; color:#fff; padding:5px;">Course Name<span class="required">*</span></label>
                                <input placeholder="Enter Name" class="form-control" value="{{$course->name}}" type="text" name="name" spellcheck="false">
                            </div>

                             <div class="form-group">
                                <label for="code" style="background-color:#000; color:#fff; padding:5px;">Course Code<span class="required">*</span></label>
                                <input value="{{$course->code}}" maxlength="7" class="form-control"  name="code" spellcheck="false" type="text">
                            </div>

                             <div class="form-group">
                                <label for="level" style="background-color:#000; color:#fff; padding:5px;">LEVEL<span class="required">*</span></label>
                               <select name="level" class="form-control">
                                    <option value="{{$course->level}}" disabled="true" selected="true">{{$course->level}} LEVEL</option>
                                    <option value="100">100 LEVEL</option>
                                    <option value="200">200 LEVEL</option>
                                    <option value="300">300 LEVEL</option>
                                    <option value="400">400 LEVEL</option>
                                </select>
                            </div>

                             <div class="form-group">
                                <label for="semester" style="background-color:#000; color:#fff; padding:5px;">Semester<span class="required">*</span></label>
                               <select name="semester" class="form-control">
                                    <option value="{{$course->semester}}" disabled="true" selected="true">{{$course->semester}} SEMESTER</option>
                                    <option value="FIRST">FIRST SEMESTER</option>
                                    <option value="SECOND">SECOND SEMESTER</option>
                                </select>
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
                <li><a href="/courses/{{$course->id}}"><b>View Course Details</b></a></li>
            </ol>
        </div>
    </div>

    </div>
</div>
 @endsection