@extends('backend.layouts.master')

    @section('title','view bands')

    @section('content')

    <div class="span9">
        <div class="content">

            @if(Session::has("message"))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <div class="module">
                <div class="module-head">
                    <h3>All Bands</h3>
                </div>

                <div class="module-body">
                    <table class="datatable-1 table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Label</th>
                                <th>Quantity</th>
                                <th>Price (F CFA)</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($bands)>0)

                                @foreach ($bands as $key=>$band)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $band->label }}</td>
                                    <td>{{ $band->quantity }}</td>
                                    <td>{{ number_format($band->unit_price) }}</td>
                                    <td>{{ $band->status }}</td>
                                    <td>{{ $band->created_at }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('band.show', [$band->id])}}">View</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('band.edit', [$band->id])}}">Edit</a>
                                    </td>
                                    <td>
                                        <form id="delete-form{{$band->id}}"
                                            method="POST"
                                            action="{{route('band.destroy', [$band->id])}}"    
                                        >@csrf
                                            {{ method_field('DELETE') }}
                                            <a href="#"
                                                onclick="if(confirm('Do you want to delete?')) {
                                                    e.preventDefault();
                                                    document.getElementById('delete-form{{$band->id}}').submit()
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
                                <td>No band to display</td>
                            @endif

                        </tbody>
					</table>
                </div>
            </div>
                		
        </div>
           			 
    </div>
</div> 


@endsection