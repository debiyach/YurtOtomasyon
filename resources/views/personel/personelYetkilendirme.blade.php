@extends('layouts.personel')

@section('content')
    @include('layouts.components.personel.personelyetkilendirme')
@endsection

@section('script')

    <script>
        if('{{json_decode(session()->get('personel')->yetki)->personelYetkiDuzenle}}' != 1){
            $('.dashboard-content').remove();
            writeNot({"type":"error","message":"Bu sayfayı görüntüleme yetkiniz yok!"});                                                                                                                                                                          
        }
                
        $('#accordionExample').hide();
        var item;

        function degistir(e) {
            e.preventDefault();
            item = e.target.value;
            if (item.trim() == 'Bir Personel Seçin')
                return $('#accordionExample').hide();
            else $('#accordionExample').show();

            $.ajax({
                type: "get",
                url: "{{ route('personel.personelYetkiGetir') }}/" + item,

                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data.binaEkle);
                    $.each(data, function(index, value) {
                        if (value) {
                            $("#" + index).prop('checked', true);
                            $("#" + index).prop('value', true);
                        }
                    });
                }
            });
        }

        $('input').change(function(e) {
            e.preventDefault();
            //var deger = this.attr('checked');
            var durum = $(this).is(':checked');
            var deger = $(this).attr('id');
            //alert(deger + ' ' + durum + ' adlı kullanıcı' + item);

            var data = {
                durum: durum,
                deger: deger,
                id: item
            };

            ajaxPostCall('{{ route('personel.personelSetYetki') }}', data, function(data){
                writeNot(data);
            });
        });


        function ajaxPostCall(route, data, callback = null) {
            $.ajax({
                url: route,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                data: data,
                success(data) {
                    callback(data);
                }
            });
        }

        function writeNot(data) {
            $.notify(data.message, data.type);
            if (data.type === 'success') {
                $('.modal').modal('hide');
            }
        }

    </script>


@endsection
