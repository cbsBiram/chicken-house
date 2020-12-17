@extends('layouts.app')

@section('content')

<band-component
    :bands="{{ $bands }}"
>
</band-component>

{{-- <script type="text/javascript">
    window.oncontextmenu = function () {
        console.log("Right Click disabled");
        return false;
    }
</script> --}}

@endsection
