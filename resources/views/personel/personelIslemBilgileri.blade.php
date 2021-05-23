    @extends('layouts.personel')

    @section('content')

        @include('layouts.components.personel.personelIslemBilgileri')


        {{-- $islemler olarak erişebilirsin işlemlere --}}

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
            $(document).ready(function() {
              table.draw();
            });
            var table =   $('#usersDatatable').DataTable({

                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    dom: '<"d-flex justify-content-between"lf>rt<"d-flex justify-content-between"Bip>',
                    "lengthMenu": [
                        [10, 15, 25, 50, 100],
                        [10, 15, 25, 50, 100]
                    ],
                    "ajax": {
                        url: "{{ route('personel.datatable.personelIslemBilgileri') }}",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Bu alanı elleme
                        },
                        data: function(d) {
                            d.id = {{Request::segment(3)}};
                            d.tarih = tarih;
                        },
                        type: "post"
                    },
                    columns: [{
                            data: 'logName'
                        },
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


                        this.api().columns(1).every(function() {
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
        </script>

    @endsection

    @include('layouts.system.datatableTags')
