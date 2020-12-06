@extends('backend.layouts.master')

@section('title','view bands')

@section('content')

    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-body">
                    {{-- <div class="profile-head media">
                        <a href="#" class="media-avatar pull-left">
                            <img src="{{ asset('edmin/code/images/user.png') }}">
                        </a>
                        <div class="media-body">
                            <h4>{{ $band->label }}</h4>
                            <p class="profile-brief">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                unknown printer took a galley of type.
                            </p>
                            <div class="profile-details muted">
                                <a href="#" class="btn"><i class="icon-plus shaded"></i>Send Friend Request </a>
                                <a href="#" class="btn"><i class="icon-envelope-alt shaded"></i>Send message </a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="btn-controls">
                        <h4>{{ $band->label }}</h4>
                        <div class="btn-box-row row-fluid">
                            
                            <a href="#" class="btn-box-darker big span4"><i class=" icon-random"></i><b>{{$band->status}}</b>
                                <p class="text-muted">
                                    Status</p>
                            </a><a href="#" class="btn-box-darker big span4"><i class="icon-user"></i><b>{{$band->loss}}</b>
                                <p class="text-muted">
                                    Number of losses</p>
                            </a><a href="#" class="btn-box-darker big span4"><i class="icon-money"></i><b>{{$band->benefits}}</b>
                                <p class="text-muted">
                                    Benefits</p>
                            </a>
                        </div>
                    </div>
                    <ul class="profile-tab nav nav-tabs">
                        <li class="active"><a href="#foods" data-toggle="tab">Foods</a></li>
                        <li><a href="#extra-charges" data-toggle="tab">Extra Charges</a></li>
                    </ul>
                    <div class="profile-tab-content tab-content">
                        <div class="tab-pane fade active in" id="foods">
                            <div class="module">
                                <div class="module-head">
                                    <h3>All Foods</h3>
                                </div>

                                <div class="module-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Type</th>
                                                <th>Quantity</th>
                                                <th>Quantity consumed</th>
                                                <th>Weight (kg)</th>
                                                <th>Price (F CFA)</th>
                                                <th>Total Price (F CFA)</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($band->foods)>0)

                                                @foreach ($band->foods as $key=>$food)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $food->type }}</td>
                                                    <td>{{ $food->quantity }}</td>
                                                    <td>{{ $food->quantity_consumed }}</td>
                                                    <td>{{ $food->weight }}</td>
                                                    <td>{{ $food->price }}</td>
                                                    <td>{{ $food->total_price }}</td>
                                                    <td>
                                                        <a class="btn btn-primary" href="{{route('food.edit', [$food->id])}}">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form id="delete-form{{$food->id}}"
                                                            method="POST"
                                                            action="{{route('food.destroy', [$food->id])}}"    
                                                        >@csrf
                                                            {{ method_field('DELETE') }}
                                                            <a href="#"
                                                                onclick="if(confirm('Do you want to delete?')) {
                                                                    e.preventDefault();
                                                                    document.getElementById('delete-form{{$food->id}}').submit()
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
                                                <td>No food to display</td>
                                            @endif

                                        </tbody>
                                    </table>
                                    <div class="mt-2">
                                        <a class="btn btn-success" href="/food/create/{{$band->id}}">Add new</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="extra-charges">
                             <div class="module">
                                <div class="module-head">
                                    <h3>All Extra Charges</h3>
                                </div>

                                <div class="module-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Label</th>
                                                <th>Type</th>
                                                <th>Quantity</th>
                                                <th>Price (F CFA)</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($band->extra_charges)>0)

                                                @foreach ($band->extra_charges as $key=>$extra_charge)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $extra_charge->label }}</td>
                                                    <td>{{ $extra_charge->type }}</td>
                                                    <td>{{ $extra_charge->quantity }}</td>
                                                    <td>{{ $extra_charge->price }}</td>
                                                    <td>
                                                        <a class="btn btn-primary" href="{{route('extra_charge.edit', [$extra_charge->id])}}">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form id="delete-form{{$extra_charge->id}}"
                                                            method="POST"
                                                            action="{{route('extra_charge.destroy', [$extra_charge->id])}}"    
                                                        >@csrf
                                                            {{ method_field('DELETE') }}
                                                            <a href="#"
                                                                onclick="if(confirm('Do you want to delete?')) {
                                                                    e.preventDefault();
                                                                    document.getElementById('delete-form{{$extra_charge->id}}').submit()
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
                                                <td>No extra charges to display</td>
                                            @endif

                                        </tbody>
                                    </table>
                                    <div class="mt-2">
                                        <a class="btn btn-success" href="{{route('extra.create')}}">Add new</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.module-body-->
            </div>
            <!--/.module-->
        </div>
        <!--/.content-->
    </div>

@endsection
