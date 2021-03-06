@extends('layouts.mudur')
{{-- $binalar => Binalar için, $katlar => Katlar için --}}
@section('content')

    @include('layouts.components.ogrenci.aidatGecmisi')

@endsection

@section('script')

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.0.1/jquery.payment.min.js">
    </script>
    <script type="text/javascript">
        var tarih;
        $(function() {

            $('input[name="tarih"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="tarih"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format(
                    'MM/DD/YYYY'));
                tarih = $('#tarih').val();
                table.draw();
            });

            $('input[name="tarih"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                tarih = '';
                table.draw();
            });
        });

        $("#odaNo").keyup(function(e) {
            table.draw();
            alert(this.value);
        });

        $("#katNo").keyup(function(e) {
            table.draw();
            alert(this.value);
        });

        var table = $('#usersDatatable').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [
                [3, "desc"]
            ],
            dom: '<"d-flex justify-content-between"lf>rt<"d-flex justify-content-between"Bip>',
            "lengthMenu": [
                [10, 15, 25, 50, 100],
                [10, 15, 25, 50, 100]
            ],
            "ajax": {
                url: "{{ route('mudur.datatable.ogrenciAidatGoruntule') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Bu alanı elleme
                },
                data: function(d) {
                    d.katNo = $("#katNo").val();
                    d.id =  {{Request::segment(3)}};
                    d.tarih = tarih;
                },
                type: "POST"
            },
            columns: [{
                    data: 'faturaNo',
                    name: 'faturaNo'
                },
                {
                    data: 'aciklama',
                    name: 'aciklama'
                },
                {
                    data: 'yatirilan',
                    name: 'yatirilan'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                }
            ],

            initComplete: function() {

                var veriler = @json($veri);
                //console.log(veriler);

                this.api().columns(0).every(function() {
                    var column = this;
                    var array = veriler;
                    var input = document.createElement("select");
                    input.id = "taksit";
                    input.className = 'form-control';

                    var option = document.createElement("option");
                    option.value = '';
                    option.text = 'Tümü';
                    input.appendChild(option);

                    console.log(array);

                    for (let i = 0; i < array.length; i++) {
                        var option = document.createElement("option");
                        option.value = array[i].id;
                        option.text = (i + 1) + '. Ay Fatura No ' + array[i].id;
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

        var table2 = $('#taksitler').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            dom: '<"d-flex justify-content-between"lf>rt<"d-flex justify-content-between"Bip>',
            "lengthMenu": [
                [10, 15, 25, 50, 100],
                [10, 15, 25, 50, 100]
            ],
            "ajax": {
                url: "{{ route('mudur.datatable.aidatListesi') . '/' . Request::segment(3) }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Bu alanı elleme
                },
                data: function(d) {
                    d.katNo = $("#katNo").val();
                },
                type: "GET"
            },
            columns: [{
                    data: 'mevcutAy',
                    name: 'mevcutAy'
                },
                {
                    data: 'durum',
                    name: 'durum'
                },
                {
                    data: 'yatirilacak',
                    name: 'yatirilacak'
                }
            ],

            initComplete: function() {

                //console.log(blok);

                var tur = [{
                        'id': 1,
                        'tur': 'Tamamlanan Taksitler'
                    },
                    {
                        'id': 0,
                        'tur': 'Devam Eden Taksitler'
                    }
                ]
                //var kat = ['1', '2', '3', '4'];

                this.api().columns(1).every(function() {
                    var column = this;
                    var array = tur;
                    var input = document.createElement("select");
                    input.id = "blok";
                    input.className = 'form-control';

                    var option = document.createElement("option");
                    option.value = '';
                    option.text = 'Tümü';
                    input.appendChild(option);


                    for (let i = 0; i < array.length; i++) {
                        var option = document.createElement("option");
                        option.value = array[i].id;
                        option.text = array[i].tur;
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

        $('#usersDatatable tbody').on('click', 'button', function() {
            var data = table.row($(this).parents('tr')).data();
            alert(data[0] + "'s salary is: " + data[5]);
        });
        $(document).ready(function() {
            table.draw();
        });

    </script>


@endsection

@include('layouts.system.datatableTags')
