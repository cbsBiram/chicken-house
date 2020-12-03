@extends('backend.layouts.master')

    @section('title','create band')

    @section('content')

    <div class="span9">
        <div class="content">

            @if(Session::has("message"))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <form action="{{ route('sale.store') }}" method="POST">@csrf
                <div class="module">
                    <div class="module-head">
                        <h3>Create Sale</h3>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
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
                            <label class="control-label">Band</label>
                            <div class="controls">
                                <select name="band" class="form-control @error('band') is-invalid @enderror">
                                    <option value="">Choose a band</value>
                                    @foreach($bands as $band)
                                        <option value="{{$band->id}}">
                                            {{$band->label}}
                                        </option>
                                    @endforeach
                                </select>

                                @error('band')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red; !important">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="control-label">Buyer</label>
                            <div class="controls">
                                <input type="text" name="buyer" class="span8 @error('buyer') border-red @enderror" 
                                    placeholder="buyer" 
                                    value="{{ old('buyer') }}"
                                >

                                @error('buyer')
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