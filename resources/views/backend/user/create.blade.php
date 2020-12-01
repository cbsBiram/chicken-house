@extends('backend.layouts.master')

	@section('title','create user')

	@section('content')

        <div class="span9">
            <div class="content">

                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                
                <div class="module">
                    <div class="module-head">
                        <h3>Create User</h3>
                    </div>

                    <div class="module-body">
                        <form action="{{ route('user.store') }}" method="POST">@csrf
                            <div class="control-group">
                                <label class="control-lable">Full name</label>
                                <div class="controls">
                                    <input type="text" name="name" class="span8 form-control @error('name') border-red  @enderror" placeholder="name" value="{{old('name')}}" >
                                </div>
                                
                                    @error('name')
                                    <span class="invalid-feedback"  role="alert">
                                        <strong style="color: red; !important">{{ $message }}</strong>
                                    </span>
                                @enderror  

                            </div>
                                
                            <div class="control-group">
                                <label class="control-lable" for="email">Email</label>
                                <div class="controls"> 
                                    <input type="text" name="email" class="span8 @error('question') border-red @enderror" placeholder="email" value=" {{old('email')}}" >
                                </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red; !important">{{ $message }}</strong>
                                    </span>
                                @enderror      

                            </div>

                            <div class="control-group">
                                <label class="control-lable" for="password">Password</label>
                                <div class="controls"> 
                                    <input type="password" name="password" class="span8 @error('password') border-red @enderror" placeholder="password" value="{{old('password')}}" >
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red; !important">{{ $message }}</strong>
                                    </span>
                                @enderror      

                            </div>

                            <div class="control-group">
                                <label class="control-lable" for="password_confirmation">Confirm Password</label>
                                <div class="controls"> 
                                    <input type="password" name="password_confirmation" class="span8 @error('password_confirmation') border-red @enderror" placeholder="confirm password" value="{{old('password_confirmation')}}" >
                                </div>

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red; !important">{{ $message }}</strong>
                                    </span>
                                @enderror      

                            </div>

                            <div class="control-group">
                                <label class="control-lable" for="phone">Phone</label>
                                <div class="controls"> 
                                    <input type="number" name="phone" class="span8 @error('phone') border-red @enderror" placeholder="phone" value="{{old('phone')}}" >
                                </div>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red; !important">{{ $message }}</strong>
                                    </span>
                                @enderror      

                            </div>

                            <div class="control-group">
                                <button type="submit" class="btn btn-success">Create User</button>

                            </div>

                        </form>

                    </div>
                </div>
                
            </div>
                
        </div>

    @endsection