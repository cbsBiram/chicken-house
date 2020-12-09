@extends('backend.layouts.master')

@section('title','Update extras charges')

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
                    <h3>Update extras charges</h3>
                </div>

                <div class="module-body">
                    <form action="{{ route('extra.update', [$extra->id]) }}" method="POST">@csrf
                        {{ method_field('PUT') }}

                        <div class="control-group">
                            <label class="control-label" for="weight">Label</label>
                            <div class="controls"> 
                                <input type="text" name="label" class="span8 @error('label') border-red @enderror" 
                                    placeholder="label" 
                                    value="{{$extra->label}}" 
                                >
                            </div>

                            @error('label')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red; !important">{{ $message }}</strong>
                                </span>
                            @enderror      

                        </div>

                        <div class="control-group">
                            <label class="control-label" for="quantity">Quantity</label>
                            <div class="controls">
                                <input type="number" name="quantity" class="span8 @error('quantity') border-red @enderror" 
                                    placeholder="quantity" 
                                    value="{{$extra->quantity}}" 
                                >
                            </div>

                            @error('quanity')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red; !important">{{ $message }}</strong>
                                </span>
                            @enderror      

                        </div>

                        <div class="control-group">
                            <label class="control-label" for="price">Price</label>
                            <div class="controls">
                                <input type="text" name="price" class="span8 @error('price') border-red @enderror" 
                                    placeholder="price" 
                                    value="{{$extra->price}}" 
                                >
                            </div>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red; !important">{{ $message }}</strong>
                                </span>
                            @enderror      

                        </div>

                        <div class="controls">
                            <select name="band" class="form-control @error('band') is-invalid @enderror">
                                <option value="">Choose a band</value>
                                @foreach($bands as $band)
                                    <option 
                                        value="{{$band->id}}"
                                        @if ($band->id == $extra->band_id)
                                            selected
                                        @endif
                                    >
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