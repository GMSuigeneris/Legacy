@extends('layouts.admin')
@section('content')

<div class="container" style="margin-top:80px;">
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
                                <input placeholder="Enter Name" class="form-control{{ $errors->has('faculty') ? ' is-invalid' : '' }}" value="{{ old('faculty') }}" required id="faculty" name="faculty" spellcheck="false">
                                
                                @if ($errors->has('faculty'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('faculty') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form_group">
                                <input type="submit" class="btn btn-primary" value="Create"/>
                            </div>
                        </form>
                    </div>
                 </div>
                </div>
            </div>
        </div>
</div>
  @endsection
 

                           
                      