@extends('layouts.main')

@once
    @push('addon-css')
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/sc-2.0.7/sl-1.4.0/datatables.min.css"/>

        @stack('child-css')
    @endpush
@endonce

@section('main-content')
    <div class="content-body">
        <div class="container-fluid">
            @includeIf('partials.navbar.main.route')
            
            <div class="row">
                @includeIf('partials.body.main.medical.box')
            </div>
        </div>
    </div>
@endsection

@once
    @push('addon-script')
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/sc-2.0.7/sl-1.4.0/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        @stack('child-script')
    @endpush
@endonce