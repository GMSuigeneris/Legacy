@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 col-lg-9 pull-left">
            <div class="card"  style="margin-top:20px;">
                <div class="card card-header text-light" style="background-color:#000;">Update Department</div>
                <div class="card card-body">
                    <form action="{{ route('departments.update',[$department->id]) }}" method="post">
                        @csrf
                        @method('put')
                    
                               <div class="form-group">
                                <label for="faculty" style="background-color:#000; color:#fff; padding:5px;">Faculty<span class="required">*</span></label>
                               <select name="faculty" class="form-control">
                                    <option value="{{$department->faculty->id}}">{{$department->faculty->name}}</option>
                                </select>
                            </div>
                          

                            <div class="form-group">
                                <label for="name" style="background-color:#000; color:#fff; padding:5px;">Department Name</label>
                                <input placeholder="Enter Name" value="{{$department->name}}" class="form-control"  name="name" spellcheck="false">
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
                <li><a href="/departments/{{$department->id}}"><b>View Department Details</b></a></li>
            </ol>
        </div>
    </div>

    </div>
</div>
 @endsection