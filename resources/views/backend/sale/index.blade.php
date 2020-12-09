@extends('backend.layouts.master')

    @section('title','view sales')

    @section('content')

    <div class="span9">
        <div class="content">

            @if(Session::has("message"))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <div class="module">
                <div class="module-head">
                    <h3>All Sales</h3>
                </div>

                <div class="module-body">
                    <table class="datatable-1 table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Band</th>
                                <th>Quantity</th>
                                <th>Price (F CFA)</th>
                                <th>Status</th>
                                <th>Buyer</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($sales)>0)

                                @foreach ($sales as $key=>$sale)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $sale->band->label }}</td>
                                    <td>{{ $sale->quantity }}</td>
                                    <td>{{ number_format($sale->price) }}</td>
                                    <td>{{ $sale->status }}</td>
                                    <td>{{ $sale->buyer }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('sale.edit', [$sale->id])}}">Edit</a>
                                    </td>
                                    <td>
                                        <form id="delete-form{{$sale->id}}"
                                            method="POST"
                                            action="{{route('sale.destroy', [$sale->id])}}"    
                                        >@csrf
                                            {{ method_field('DELETE') }}
                                            <a href="#"
                                                onclick="if(confirm('Do you want to delete?')) {
                                                    e.preventDefault();
                                                    document.getElementById('delete-form{{$sale->id}}').submit()
                                                    } else {
                                                        e.preventDefault();
                                                    }
                                                "
                                            >
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            @else 
                                <td>No sale to display</td>
                            @endif

                        </tbody>
					</table>
                </div>
            </div>
                		
        </div>
           			 
    </div>
</div> 


@endsection