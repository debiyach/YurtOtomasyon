@extends('layouts.mudur')

@section('content')
    <div class="offset-md-3 col-md-6">
        <div class="input-group-prepend">
            <label class="input-group-text" for="personel">Blok seçiniz</label>
        </div>
        <select class="custom-select" id="binaSec">
            <option selected>Blok seçiniz</option>
            @foreach ($binalar as $item)
                <option value="{{ $item->id }}">{{ $item->binaAdi }}</option>
            @endforeach
        </select>
    </div>
    <div class="sonuc"></div>


@endsection

@section('script')
    <script>
        let katlar = [];
        let binalar = [];

        $("#binaSec").on("change", function(e) {
            e.preventDefault();
            var id = e.target.value;
            $.ajax({
                type: "POST",
                url: "{{ route('mudur.binaGetir') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Bu alanı elleme
                },
                data: {
                    "id": id
                },
                success: function(response) {
                    $('.sonuc').html(response);
                }
            });


        });

    </script>
@endsection
