@extends('backend.layouts.master')

@section('title','Update Band')

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
                    <h3>Update Band</h3>
                </div>

                <div class="module-body">
                    <form action="{{ route('band.update', [$band->id]) }}" method="POST">@csrf
                        {{ method_field('PUT') }}

                        <div class="control-group">
                            <label class="control-label">Label</label>
                            <div class="controls">
                                <input type="text" name="label" class="span8 @error('label') border-red @enderror" 
                                    placeholder="label" value="{{$band->label}}"
                                >
                            </div>
                            
                            @error('label')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red; !important">{{ $message }}</strong>
                                </span>
                            @enderror  

                        </div>

                        <div class="control-group">
                            <label class="control-lable" for="quantity">Quantity</label>
                            <div class="controls">
                                <input type="number" name="quantity" class="span8 @error('quantity') border-red @enderror" 
                                    placeholder="quantity" 
                                    value="{{$band->quantity}}" 
                                >
                            </div>

                            @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red; !important">{{ $message }}</strong>
                                </span>
                            @enderror      

                        </div>

                        <div class="control-group">
                            <label class="control-lable" for="unit_price">Unit Price</label>
                            <div class="controls">
                                <input type="text" name="unit_price" class="span8 @error('unit_price') border-red @enderror" 
                                    placeholder="unit_price" 
                                    value="{{$band->unit_price}}" 
                                >
                            </div>

                            @error('unit_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red; !important">{{ $message }}</strong>
                                </span>
                            @enderror      

                        </div>

                        <div class="control-group">
                            <label class="control-lable" for="loss">Loss</label>
                            <div class="controls">
                                <input type="number" name="loss" class="span8 @error('loss') border-red @enderror" 
                                    placeholder="loss" 
                                    value="{{$band->loss}}" 
                                >
                            </div>

                            @error('loss')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red; !important">{{ $message }}</strong>
                                </span>
                            @enderror      

                        </div>

                        <div class="control-group">
                            <label class="control-lable" for="provider">Provider</label>
                            <div class="controls"> 
                                <input type="text" name="provider" class="span8 @error('provider') border-red @enderror" 
                                    placeholder="provider" 
                                    value="{{$band->provider}}" 
                                >
                            </div>

                            @error('provider')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red; !important">{{ $message }}</strong>
                                </span>
                            @enderror      

                        </div>

                        <div class="control-group">
                            <button type="submit" class="btn btn-success">Update Band</button>
                        </div>

                    </form>

                </div>
            </div>
            
            </div>
            
        </div>
    </div> 

@endsection