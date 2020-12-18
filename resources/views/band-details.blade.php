@extends('layouts.app')

@section('content')

<band-details-component
    :band = "{{ $band }}"
    :foods = "{{ $band->foods }}"
    :extras = "{{ $band->extra_charges }}"
>
</band-details-component>

{{-- <script type="text/javascript">
    window.oncontextmenu = function () {
        console.log("Right Click disabled");
        return false;
    }
</script> --}}

@endsection
