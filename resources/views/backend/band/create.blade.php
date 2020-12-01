@extends('backend.layouts.master')

    @section('title','create band')

    @section('content')

    <div class="span9">
        <div class="content">

            @if(Session::has("message"))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <form action="{{ route('band.store') }}" method="POST">@csrf
                <div class="module">
                    <div class="module-head">
                        <h3>Create band</h3>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <label class="control-label">Label</label>
                            <div class="controls">
                                <input type="text" name="label" class="span8 @error('label') border-red @enderror" 
                                    placeholder="label" 
                                    value="{{ old('label') }}"
                                >

                                @error('label')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red; !important">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="control-label">Quantity</label>
                            <div class="controls">
                                <input type="number" name="quantity" class="span8 @error('quantity') border-red @enderror" 
                                    placeholder="quantity" 
                                    value="{{old('quantity')}}" 
                                >

                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red; !important">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="control-label">Unit Price (F CFA)</label>
                            <div class="controls">
                                <input type="text" name="unit_price" class="span8 @error('unit_price') border-red @enderror" 
                                    placeholder="price" 
                                    value="{{ old('unit_price') }}"
                                >

                                @error('unit_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red; !important">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="control-label">Provider</label>
                            <div class="controls">
                                <input type="text" name="provider" class="span8 @error('provider') border-red @enderror" 
                                    placeholder="provider" 
                                    value="{{ old('provider') }}"
                                >

                                @error('provider')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red; !important">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="controls">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection