@extends('layouts.app')

@section('content')

<sale-component
    :sales="{{ $sales }}"
>
</sale-component>

{{-- <script type="text/javascript">
    window.oncontextmenu = function () {
        console.log("Right Click disabled");
        return false;
    }
</script> --}}

@endsection
