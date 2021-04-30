@extends('layouts.personel')

@section('content')
    @include('layouts.components.personel.personelyetkilendirme')
@endsection

@section('script')

    <script>
        function degistir(e) {
            e.preventDefault();
            var item = e.target.value;

            $.ajax({
                type: "get",
                url: "{{ route('personel.personelYetkiGetir') }}/" + item,

                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data.binaEkle);
                    $.each(data, function(index, value) {
                        if (value) {
                            $("#" + index).prop('checked', true);
                        }
                    });
                }
            });
        }

        $('input').change(function(e) {
            e.preventDefault();
            var id = this.id;
            //var deger = this.attr('checked');
            var deger = $(this).val();
            alert(deger);
        });

    </script>


@endsection
