@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-lg-8 mx-auto">
            <div class="card" style="margin-top:30px;">
                <div class="card card-header text-light" style="background-color:#000;">Create new Faculty</div>
                <div class="card card-body">

                     <div class="col-sm-12 " style="padding:10px; margin:5px;">
                        <form action="{{ route('faculties.store') }}" method="post">
                            @csrf
                        
                            <div class="form-group">
                                <label for="faculty" style="background-color:#000; color:#fff; padding:5px;">Name<span class="required">*</span></label>
                                <input placeholder="Enter Name" class="form-control" required id="faculty" name="name" spellcheck="false">
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
                    <a href="/faculties"><li>All Faculties</li></a>
                </ul>
            </div>
        </div>
</div>
     @endsection