@extends('backend.layouts.master')

    @section('title','list users')

    @section('content')

    <div class="span9">
        <div class="content">

            @if(Session::has("message"))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <div class="module">
                <div class="module-head">
                    <h3>All Users</h3>
                </div>

                <div class="module-body">
                    <table class="datatable-1 table table-striped display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($users)>0)

                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{route('user.edit', [$user->id])}}">Edit</a>
                                        </td>
                                        <td>
                                            <form id="delete-form{{ $user->id }}"
                                                method="POST"
                                                action="{{route('user.destroy', [$user->id])}}"
                                                style="display: none;"    
                                            >@csrf
                                                {{ method_field('DELETE') }}
                                            
                                            </form>    
                                            <a href="#"
                                                onclick="if(confirm('Do you want to delete?')) {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form{{$user->id}}').submit()
                                                    } else {
                                                        e.preventDefault();
                                                    }
                                                "
                                            > 
                                                @if ($user->id == auth()->user()->id)
                                                    <span></span>
                                                @else
                                                    <input type="submit" class="btn btn-danger" value="Delete">
                                                @endif
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                        @else 
                            <td>No users to display</td>
                        @endif
                    </table>
                </div>
            </div>
                		
        </div>
           			 
    </div>
</div> 


@endsection