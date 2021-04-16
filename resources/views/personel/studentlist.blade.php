@extends('layouts.personel')

@section('content')

    @include('layouts.components.ogrencilistele')

@endsection

@section('script')

    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        });
    </script>

@endsection

@include('layouts.system.datatableTags')


