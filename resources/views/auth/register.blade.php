@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#000;color:#fff;">{{ __('Register') }}</div>

                <div class="card-body">
                   <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="middlename" class="col-md-4 col-form-label text-md-right">Middlename</label>

                            <div class="col-md-6">
                                <input id="middlename" type="text" class="form-control" name="middlename" value="{{ old('middlename') }}" autofocus>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Lastname</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                            <div class="col-md-6">
                                <select id="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" required autofocus>
                                    <option value="0" disabled="true" selected="true">===Please select a Gender===</option>
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                           <div class="form-group row">
                            <label for="religion" class="col-md-4 col-form-label text-md-right">Religion</label>

                            <div class="col-md-6">
                                <select id="religion" class="form-control{{ $errors->has('religion') ? ' is-invalid' : '' }}" name="religion" required autofocus>
                                    <option value="0" disabled="true" selected="true">===Please select a Religion===</option>
                                    <option value="CHRISTIANITY">CHRISTIANITY</option>
                                    <option value="ISLAM">ISLAM</option>
                                    <option value="OTHERS">OTHERS</option>
                                </select>
                                @if ($errors->has('religion'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('religion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="faculty" class="col-md-4 col-form-label text-md-right">Faculty</label>

                            <div class="col-md-6">
                            <select id="faculty" class="form-control{{ $errors->has('faculty') ? ' is-invalid' : '' }}" name="faculty" required autofocus>
                                    <option value="0" disabled="true" selected="true">===Please Select a Faculty===</option>
                                    @foreach($faculties as $faculty)
                                        <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('faculty'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('faculty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>

                            <div class="col-md-6">
                                <select id="department" class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}" name="department" required autofocus>
                                    <option value="0" disabled="true" selected="true">===Please select a Department===</option>
                                </select>
                                @if ($errors->has('department'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="level" class="col-md-4 col-form-label text-md-right">Level</label>

                            <div class="col-md-6">
                                <select id="level" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" required autofocus>
                                    <option value="0" disabled="true" selected="true">===Please select a Level===</option>
                                    <option value="100">100 LEVEL</option>
                                    <option value="200">200 LEVEL</option>
                                    <option value="300">300 LEVEL</option>
                                    <option value="400">400 LEVEL</option>
                                </select>
                                @if ($errors->has('level'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="semester" class="col-md-4 col-form-label text-md-right">SEMESTER</label>

                            <div class="col-md-6">
                                <select id="semester" class="form-control{{ $errors->has('semester') ? ' is-invalid' : '' }}" name="semester" required autofocus>
                                    <option value="0" disabled="true" selected="true">===Please select a Semester===</option>
                                    <option value="FIRST">FIRST SEMESTER</option>
                                    <option value="SECOND">SECOND SEMESTER</option>
                                </select>
                                @if ($errors->has('semester'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('semester') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="Upload" class="col-md-4 col-form-label text-md-right">Upload Image</label>

                            <div class="col-md-6">
                                <input id="Upload" type="file" class="form-control" name="image">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn" style="background-color:#000; color:#fff;">
                                   Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
