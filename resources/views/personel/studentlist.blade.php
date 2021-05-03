@extends('layouts.personel')
{{-- $binalar => Binalar için, $katlar => Katlar için --}}
@section('content')


    @include('layouts.components.ogrenci.ogrencilistele')

@endsection

@section('script')

    <script>


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
                url: "{{ route('personel.datatable.ogrencigetir') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Bu alanı elleme
                },
                data: function(d) {
                    d.binaNo = $('#binalar :selected').val();
                },
                type: "POST"
            },
            columns: [{
                data: 'id',
                name: 'id'
            },
                {
                    data: 'ad',
                    name: 'ad'
                },
                {
                    data: 'soyad',
                    name: 'soyad'
                },
                {
                    data: 'mail',
                    name: 'mail'
                },
                {
                    data: 'telNo',
                    name: 'telNo'
                },
                {
                    data: 'tcNo',
                    name: 'tcNo'
                },
                {
                    data: 'binaNo',
                    name: 'binaNo'
                },
                {
                    data: 'katNo',
                    name: 'katNo'
                },
                {
                    data: 'odaNo',
                    name: 'odaNo'
                }
            ],

            "columnDefs": [{
                "targets": 9,
                "data": "id",
                "mRender": function(data, type, full) {
                    return '<a class="btn btn-info btn-sm" href={{ route('personel.ogrenciIslemBilgileri') }}' +
                        '/' + data + '>' + 'İşlem Bilgileri' + '</a>';

                }
            }],


            initComplete: function() {
                var blok = [];
                var kat = [];

                var gelenbinalar = @json($binalar);
                gelenbinalar.forEach(element => {
                    blok.push(element.binaAdi);
                });

                var gelenkatlar = @json($katlar);
                gelenkatlar.forEach(element => {
                    kat.push(element.katAdi);
                });

                //console.log(blok);

                //var blok = ['1', '2']
                //var kat = ['1', '2', '3', '4'];

                this.api().columns(6).every(function() {
                    var column = this;
                    var array = blok;
                    var input = document.createElement("select");
                    input.id = "blok";
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

                this.api().columns(7).every(function() {
                    var column = this;
                    var array = kat;
                    var input = document.createElement("select");
                    input.id = "katlar";
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

                this.api().columns(8).every(function() {
                    var column = this;
                    var input = document.createElement("input");
                    input.id = "odalar";
                    input.className = 'form-control';

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
