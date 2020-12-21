@extends('layouts.app')

@section('content')

<band-details-component
    :band = "{{ $band }}"
    :foods = "{{ json_encode($foods) }}"
    :extras = "{{ json_encode($extras) }}"
>
</band-details-component>

{{-- <script type="text/javascript">
    window.oncontextmenu = function () {
        console.log("Right Click disabled");
        return false;
    }
</script> --}}

@endsection
