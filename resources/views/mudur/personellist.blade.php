@extends('layouts.mudur')

@section('content')

    @include('layouts.components.personel.personellistele')

@endsection

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
                    url: "{{ route('mudur.datatable.personelgetir') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Bu alanı elleme
                    },
                    data: function(d) {},
                    type: "POST"
                },
                columns: [{
                        data: 'ad'
                    },
                    {
                        data: 'soyad'
                    },
                    {
                        data: 'mail'
                    },
                    {
                        data: 'telNo'
                    },
                    {
                        data: 'tcNo'
                    },
                    {
                        data: 'evAdresi'
                    }
                ],

                "columnDefs": [{
                    "targets": 6,
                    "data": "id",
                    "mRender": function(data, type, full) {
                        return '<a class="btn btn-info btn-sm" href={{ route('mudur.personelIslemBilgileri') }}' +
                            '/' + data + '>' + 'İşlem Bilgileri' + '</a>';

                    }
                }],

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

@include('layouts.system.datatableTags')
