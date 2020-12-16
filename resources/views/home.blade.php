@extends('layouts.app')

@section('content')

<dashboard-component
    :bands = "{{ $bands }}"
    :sales = "{{ $sales }}"
    :sales-figure = "{{ $sales_figure }}"
    :band-in-progress = "{{ $band_in_progress }}"
    :monthly-performance = "{{ json_encode($monthly_performance)  }}" 
>
</dashboard-component>

{{-- <script type="text/javascript">
    window.oncontextmenu = function () {
        console.log("Right Click disabled");
        return false;
    }
</script> --}}

@endsection
