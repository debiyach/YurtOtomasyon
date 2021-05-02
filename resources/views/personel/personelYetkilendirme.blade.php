@extends('layouts.personel')

@section('content')
    @include('layouts.components.personel.personelyetkilendirme')
@endsection

@section('script')

    <script>
        var item;

        function degistir(e) {
            e.preventDefault();
            item = e.target.value;

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
            alert(deger + ' ' + durum + ' adlı kullanıcı' + item);

            var data = {
                durum: durum,
                deger: deger,
                id: item
            };

            ajaxPostCall('{{ route('personel.denemeseysi') }}', data);
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

    </script>


@endsection
