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
                columns: [{
                        data: 'aciklama'
                    },
                    {
                        data: 'tip'
                    },
                    {
                        data: 'onayDurumu'
                    },
                    {
                        data: 'created_at'
                    },
                ],


                initComplete: function() {
                    var Tur = ['Istek', 'Şikayet', 'Arıza Bildirimi']

                    this.api().columns(1).every(function() {
                        var column = this;
                        var array = Tur;
                        var input = document.createElement("select");
                        input.id = "tur";
                        input.className = 'form-control';


                        var option = document.createElement("option");
                        option.value = '';
                        option.text = 'Tümü';
                        input.appendChild(option);

                        for (let i = 0; i < array.length; i++) {
                            var option = document.createElement("option");
                            option.value = array[i];
                            option.text = array[i];
                            input.appendChild(option);
                        }

                        //var input = document.createElement('input');
                        $(input).appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? val : '', true, false).draw();
                            });
                    });

                },

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
