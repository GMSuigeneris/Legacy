@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-lg-8 mx-auto">
            <div class="card" style="margin-top:30px;">
                <div class="card card-header text-light" style="background-color:#000;">Create new Course</div>
                <div class="card card-body">

                     <div class="col-sm-12 " style="padding:10px; margin:5px;">
                        <form action="{{ route('courses.store') }}" method="post">
                             
                            @if($department != null)
                             <div class="form-group">
                                <label for="faculty" style="background-color:#000; color:#fff; padding:5px;">Faculty<span class="required">*</span></label>
                               <select name="faculty" class="form-control">
                                    <option value="{{$department->faculty->id}}">{{$department->faculty->name}}</option>
                                </select>
                            </div>
                               <div class="form-group">
                                <label for="department" style="background-color:#000; color:#fff; padding:5px;">Department<span class="required">*</span></label>
                               <select name="department" class="form-control">
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                </select>
                            </div>
                            @endif

                        
                        @if($departments != null)
                         <div class="form-group">
                            <label for="faculty" style="background-color:#000; color:#fff; padding:5px;">Faculty</label>
                                <select name="faculty" id="faculty" class="form-control">
                                 <option value="0" disabled="true" selected="true">===Please Select a Faculty===</option>
                                @foreach($faculties as $faculty)
                                    <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                            <label for="departments" style="background-color:#000; color:#fff; padding:5px;">Department</label>
                               <select id="department" class="form-control" name="department" required autofocus>
                                    <option value="0" disabled="true" selected="true">===Please select a Department===</option>
                                </select>
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="name" style="background-color:#000; color:#fff; padding:5px;">Course Name<span class="required">*</span></label>
                                <input placeholder="Enter Name" class="form-control" type="text" name="name" spellcheck="false">
                            </div>

                             <div class="form-group">
                                <label for="code" style="background-color:#000; color:#fff; padding:5px;">Course Code<span class="required">*</span></label>
                                <input placeholder="Enter Course Code" maxlength="7" class="form-control"  name="code" spellcheck="false" type="text">
                            </div>

                             <div class="form-group">
                                <label for="level" style="background-color:#000; color:#fff; padding:5px;">LEVEL<span class="required">*</span></label>
                               <select name="level" class="form-control">
                                    <option value="0" disabled="true" selected="true">===Please select a Level===</option>
                                    <option value="100">100 LEVEL</option>
                                    <option value="200">200 LEVEL</option>
                                    <option value="300">300 LEVEL</option>
                                    <option value="400">400 LEVEL</option>
                                </select>
                            </div>

                             <div class="form-group">
                                <label for="semester" style="background-color:#000; color:#fff; padding:5px;">Semester<span class="required">*</span></label>
                               <select name="semester" class="form-control">
                                    <option value="0" disabled="true" selected="true">===Please select a Semester===</option>
                                    <option value="FIRST">FIRST SEMESTER</option>
                                    <option value="SECOND">SECOND SEMESTER</option>
                                </select>
                            </div>

                             @csrf
                            <div class="form_group">
                                <input type="submit" class="btn btn-primary" value="Create"/>
                            </div>
                        </form>
                    </div>
                 </div>
                </div>
            </div>
            <div class="pull-right col-md-2">
                <h3 style="margin-top:30px; color:#fff;">Actions</h3>
                <ul style="list-style:none;">
                    <a href="/courses"><li>All Courses</li></a>
                </ul>
            </div>
        </div>
</div>
     @endsection