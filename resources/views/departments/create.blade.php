@extends('layouts.admin')
@section('content')
<div class="container" style="margin-top:40px;">
    <div class="row">
        <div class="col-md-8 col-lg-8 mx-auto">
            <div class="card" style="margin-top:30px;">
                <div class="card card-header text-light" style="background-color:#000;">Create new department</div>
                <div class="card card-body">
                     <div class="col-sm-12 " style="padding:10px; margin:5px;">
                        <form action="{{ route('departments.store') }}" method="post">
                            @csrf
                            @if($faculty != null)
                               <div class="form-group">
                                <label for="faculty" style="background-color:#000; color:#fff; padding:5px;">Faculty<span class="required">*</span></label>
                               <select name="faculty" class="form-control">
                                    <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                                </select>
                            </div>
                            @endif

                        
                        @if($faculties != null)
                            <div class="form-group">
                            <label for="faculty" style="background-color:#000; color:#fff; padding:5px;">Company</label>
                                <select name="faculty" class="form-control">
                                @foreach($faculties as $faculty)
                                    <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="name" style="background-color:#000; color:#fff; padding:5px;">Department Name</label>
                                <input placeholder="Enter Name" class="form-control"  name="name" spellcheck="false">
                            </div>

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
                    <a href="/departments"><li>All departments</li></a>
                </ul>
            </div>
        </div>
</div>
@endsection