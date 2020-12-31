@extends('layouts.app')

@section('content')

<band-details-component
    :band = "{{ $band }}"
    :foods = "{{ json_encode($foods) }}"
    :extras = "{{ json_encode($extras) }}"
    :sales-figures = "{{ $sales_figures }}"
    :sold-percentage = "{{ $sold_percentage }}"
    :loss-percentage = "{{ $loss_percentage }}"
>
</band-details-component>

{{-- <script type="text/javascript">
    window.oncontextmenu = function () {
        console.log("Right Click disabled");
        return false;
    }
</script> --}}

@endsection
