@extends('backend.layouts.master')

@section('title','Update Sale')

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
                    <h3>Update Sale</h3>
                </div>

                <div class="module-body">
                    <form action="{{ route('sale.update', [$sale->id]) }}" method="POST">@csrf
                        {{ method_field('PUT') }}

                        <div class="control-group">
                            <label class="control-lable" for="quantity">Quantity</label>
                            <div class="controls">
                                <input type="number" name="quantity" class="span8 @error('quantity') border-red @enderror" 
                                    placeholder="quantity" 
                                    value="{{$sale->quantity}}" 
                                >
                            </div>

                            @error('quantity')
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
                                    value="{{$sale->price}}" 
                                >
                            </div>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red; !important">{{ $message }}</strong>
                                </span>
                            @enderror      

                        </div>

                        <label class="control-label">Status</label>
                        <div class="controls">
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="">Choose a status</value>
                                <option 
                                    value="pending"
                                    @if ($sale->status == "pending")
                                        selected
                                    @endif
                                >
                                    Pending
                                </option>
                                <option 
                                    value="paid"
                                    @if ($sale->status == "paid")
                                        selected
                                    @endif
                                >
                                    Paid
                                </option>
                            </select>

                            @error('status')
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
                                    <option 
                                        value="{{$band->id}}"
                                        @if ($band->id == $sale->band_id)
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
                            <label class="control-lable" for="buyer">Buyer</label>
                            <div class="controls"> 
                                <input type="text" name="buyer" class="span8 @error('buyer') border-red @enderror" 
                                    placeholder="buyer" 
                                    value="{{$sale->buyer}}" 
                                >
                            </div>

                            @error('buyer')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red; !important">{{ $message }}</strong>
                                </span>
                            @enderror      

                        </div>

                        <div class="control-group">
                            <button type="submit" class="btn btn-success">Update Sale</button>
                        </div>

                    </form>

                </div>
            </div>
            
            </div>
            
        </div>
    </div> 

@endsection