@extends('backend.layouts.master')

@section('title','Update foods charges')

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
                    <h3>Update food charges</h3>
                </div>

                <div class="module-body">
                    <form action="{{ route('food.update', [$food->id]) }}" method="POST">@csrf
                        {{ method_field('PUT') }}

                        <div class="control-group">
                            <label class="control-label" for="type">Type</label>
                            <div class="controls">
                                <select name="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="">Choose a category</value>
                                    <option 
                                        value="start"
                                        @if ($food->type == "start")
                                            selected
                                        @endif
                                    >
                                        Start
                                    </option>
                                    <option 
                                        value="growth"
                                        @if ($food->type == "growth")
                                            selected
                                        @endif
                                    >
                                        Growth
                                    </option>
                                    <option 
                                        value="finish"
                                        @if ($food->type == "finish")
                                            selected
                                        @endif
                                    >
                                        Finish
                                    </option>
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red; !important">{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="quantity">Quantity</label>
                            <div class="controls">
                                <input type="number" name="quantity" class="span8 @error('quantity') border-red @enderror" 
                                    placeholder="quantity" 
                                    value="{{$food->quantity}}" 
                                >
                            </div>

                            @error('quanity')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red; !important">{{ $message }}</strong>
                                </span>
                            @enderror      

                        </div>

                        <div class="control-group">
                            <label class="control-label" for="quantity_consumed">Quantity Consumed</label>
                            <div class="controls">
                                <input type="text" name="quantity_consumed" class="span8 @error('quantity_consumed') border-red @enderror" 
                                    placeholder="quantity_consumed" 
                                    value="{{$food->quantity_consumed}}" 
                                >
                            </div>

                            @error('quantity_consumed')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red; !important">{{ $message }}</strong>
                                </span>
                            @enderror      

                        </div>

                        <div class="control-group">
                            <label class="control-lable" for="price">Price</label>
                            <div class="controls">
                                <input type="text" name="price" class="span8 @error('price') border-red @enderror" 
                                    placeholder="price" 
                                    value="{{$food->price}}" 
                                >
                            </div>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red; !important">{{ $message }}</strong>
                                </span>
                            @enderror      

                        </div>

                        <div class="control-group">
                            <label class="control-lable" for="weight">Weight</label>
                            <div class="controls"> 
                                <input type="text" name="weight" class="span8 @error('weight') border-red @enderror" 
                                    placeholder="weight" 
                                    value="{{$food->weight}}" 
                                >
                            </div>

                            @error('provider')
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
                                        @if ($band->id == $food->band_id)
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