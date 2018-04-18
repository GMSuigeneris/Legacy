@extends('layouts.app')
@section('content') 
        
<div class="container">
    <div class="row">
        <div class="col-md-9 col-lg-9 mx-auto">
            <div class="card">
                <div class="card card-header text-light" style="background-color:#000;">Course Registration</div>
                <div class="card card-body">
                    <form action="{{ url('reg.store') }}" method="post">
                            {{ csrf_field() }}
                        
                            <div class="form-group">
                                <label for="faculty" style="background-color:#000; color:#fff; padding:5px;">FACULTY<span class="required">*</span></label>
                                <select name="faculty" class="form-control" disabled>
                                    <option value="{{Auth::user()->faculty->id}}">{{Auth::user()->faculty->name}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="department" style="background-color:#000; color:#fff; padding:5px;">DEPARTMENT<span class="required">*</span></label>
                                <select name="department" id="departmentid" class="form-control" disabled>
                                    <option value="{{Auth::user()->department->id}}">{{Auth::user()->department->name}}</option>
                                </select>
                            </div>

                             <div class="form-group">
                                <label for="level" style="background-color:#000; color:#fff; padding:5px;">LEVEL<span class="required">*</span></label>
                                <select name="level" id="level" class="form-control">
                                    <option value="{{Auth::user()->level}}" selected="true">{{Auth::user()->level}}</option>
                                </select>
                            </div>

                             <div class="form-group">
                                <label for="semester" style="background-color:#000; color:#fff; padding:5px;">SEMESTER<span class="required">*</span></label>
                                <select name="semester" id="semester" class="form-control">
                                    <option value="{{Auth::user()->semester}}" selected="true">{{Auth::user()->semester}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                            <label for="courses" style="background-color:#000; color:#fff; padding:5px;">COURSES</label>
                                <select id="collect" class="form-control" name="test[]" required autofocus multiple size="3">
                                     <option value="0" disabled="true" selected="true">===Please select Your Courses===</option>
                                     @foreach($courses as $course)
                                          <option value="{{$course->id}}">{{$course->code}}-{{$course->name}} </option>
                                     @endforeach
                                </select>
                            </div>

                             

                            <div class="form_group">
                                <input type="submit" class="btn btn-dark" value="Register"/>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection