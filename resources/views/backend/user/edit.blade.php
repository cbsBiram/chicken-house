@extends('backend.layouts.master')

	@section('title','Update user')

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
                                <h3>Update User</h3>
                            </div>

                            <div class="module-body">
                            	<form action="{{ route('user.update', [$user->id]) }}" method="POST">@csrf
                                    {{ method_field('PUT') }}

                                    <div class="control-group">
                            			<label class="control-label">Full name</label>
                            			<div class="controls">
                                            <input type="text" name="name" class="span8 @error('name') border-red @enderror" 
                                                placeholder="name" value="{{$user->name}}"
                                            >
                                        </div>
                                        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red; !important">{{ $message }}</strong>
                                            </span>
                                        @enderror  

                            		</div>

                                    <div class="control-group">
                                        <label class="control-lable" for="password">Password</label>
                                        <div class="controls"> 
                                            <input type="text" name="password" class="span8 @error('password') border-red @enderror" 
                                                placeholder="password" 
                                            >
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
                                            <input type="password" name="password_confirmation" class="span8 @error('password_confirmation') border-red @enderror" placeholder="confirm password" >
                                        </div>

                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red; !important">{{ $message }}</strong>
                                            </span>
                                        @enderror      

                                    </div>

                                    <div class="control-group">
                                        <label class="control-lable" for="occupation">Phone</label>
                                        <div class="controls"> 
                                            <input type="text" name="phone" class="span8 @error('phone') border-red @enderror" 
                                                placeholder="phone" value=" {{ $user->phone }}" 
                                            >
                                        </div>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red; !important">{{ $message }}</strong>
                                            </span>
                                        @enderror      

                                    </div>

                                    <div class="control-group">
                                        <button type="submit" class="btn btn-success">Update User</button>
                                    </div>

                                </form>

                       		</div>
                   		</div>
                		
                		</div>
           			 
           			</div>
        		</div> 

@endsection