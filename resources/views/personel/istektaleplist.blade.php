@extends('layouts.personel')
@section('content')

    @include('layouts.components.istektaleplist')

@endsection
@include('layouts.system.datatableTags')

@section('script')
    <script>
        $(document).ready(function() {
            $('#usersDatatable').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                dom: '<"d-flex justify-content-between"lf>rt<"d-flex justify-content-between"Bip>',
                "lengthMenu": [
                    [10, 15, 25, 50, 100],
                    [10, 15, 25, 50, 100]
                ],
                "ajax": {
                    url: "{{ route('personel.datatable.istekSikayetGetir') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Bu alanı elleme
                    },
                    data: function(d) {},
                    type: "POST"
                },
                columns: [
                    {data: 'ad'},
                    {data: 'soyad'},
                    {data: 'mail'},
                    {data: 'telNo'},
                    {data: 'tcNo'}
                ],

                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Turkish.json"
                },
                buttons: [{
                        extend: 'excel',
                        text: 'Excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'csv',
                        text: 'CSV'
                    },
                    {
                        extend: 'copy',
                        text: 'Kopyala'
                    },
                    {
                        extend: 'print',
                        text: 'Yazdır'
                    }
                ]
            });
        });

    </script>
@endsection
