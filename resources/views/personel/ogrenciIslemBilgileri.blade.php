@extends('layouts.personel')

@section('content')

    @include('layouts.components.ogrenci.ogrenciIslemBilgileri')

@endsection

@section('script')

    <script>
        $(document).ready(function() {
            var table = $('#usersDatatable').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                dom: '<"d-flex justify-content-between"lf>rt<"d-flex justify-content-between"Bip>',
                "lengthMenu": [
                    [10, 15, 25, 50, 100],
                    [10, 15, 25, 50, 100]
                ],
                "ajax": {
                    url: //"{{ route('personel.datatable.ogrencigetir') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Bu alanı elleme
                    },
                    data: function(d) {},
                    type: "POST"
                },
                columns: [{
                        data: 'id'
                    },
                    {
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
                        data: 'odaNo'
                    }
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

            $('#usersDatatable tbody').on('click', 'button', function() {
                var data = table.row($(this).parents('tr')).data();
                alert(data[0] + "'s salary is: " + data[5]);
            });
        });


    </script>

@endsection

@include('layouts.system.datatableTags')