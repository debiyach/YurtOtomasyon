@extends('layouts.personel')

@section('content')

    @include('layouts.components.ogrenci.ogrenciIslemBilgileri')

    {{-- $islemler olarak erişebilirsin işlemlere --}}

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
                    url: "{{ route('personel.datatable.ogrenciIslemBilgileri') . '/' . Request::segment(3) }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Bu alanı elleme
                    },
                    data: function(d) {},
                    type: "POST"
                },
                columns: [
                        {
                            data: 'logId'
                        },
                        {
                            data: 'created_at'
                        }
                ],

                initComplete: function() {
                    var islemler = [];

                    var islemcesitleri = @json($islemler);
                    islemcesitleri.forEach(element => {
                        islemler.push(element);
                    });


                    this.api().columns(0).every(function() {
                        var column = this;
                        var array = islemler;
                        var input = document.createElement("select");
                        input.id = "islemler";
                        input.className = 'form-control';

                        var option = document.createElement("option");
                        option.value = '';
                        option.text = 'Tümü';
                        input.appendChild(option);


                        for (let i = 0; i < array.length; i++) {
                            var option = document.createElement("option");
                            option.value = array[i].id;
                            option.text = array[i].tip;
                            input.appendChild(option);
                        }

                        //var input = document.createElement('input');
                        $(input).appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this)
                                    .val());

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

            $('#usersDatatable tbody').on('click', 'button', function() {
                var data = table.row($(this).parents('tr')).data();
                alert(data[0] + "'s salary is: " + data[5]);
            });
        });

    </script>

@endsection

@include('layouts.system.datatableTags')
