@extends('backend.layouts.master')

    @section('title','create food charges')

    @section('content')

    <div class="span9">
        <div class="content">

            @if(Session::has("message"))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <form action="/food/store/{{$band_id}}" method="POST">@csrf
                <div class="module">
                    <div class="module-head">
                        <h3>Create food charges</h3>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <label class="control-label">Type</label>
                            <div class="controls">
                                <select name="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="">Choose a category</value>
                                    <option value="start">Start</option>
                                    <option value="growth">Growth</option>
                                    <option value="finish">Finish</option>
                                </select>

                                @error('type')
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
                            <label class="control-label">Weight (Kg)</label>
                            <div class="controls">
                                <input type="text" name="weight" class="span8 @error('weight') border-red @enderror" 
                                    placeholder="weight" 
                                    value="{{ old('weight') }}"
                                >

                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red; !important">{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            <label class="control-label">Price (F CFA)</label>
                            <div class="controls">
                                <input type="text" name="price" class="span8 @error('price') border-red @enderror" 
                                    placeholder="price" 
                                    value="{{ old('price') }}"
                                >

                                @error('price')
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