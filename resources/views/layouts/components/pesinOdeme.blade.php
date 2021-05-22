<div class="col-12 col-md-6 offset-md-3">
    <div class="col-12">
        @include('layouts.components.errors')
    </div>

    <h3>Pesin Ödeme</h3>

    <form method="POST" id="credit" action="{{ route('personel.pesinOde') }}">
        @csrf
        <input type="hidden" name="aidatId" value="{{ $aidat->id }}">

        <div class="form-group">
            <label for="aciklama">Yatırılacak Tutar</label>
            <input type="number" name="para" class="form-control cc-cvc" required max="{{ $aidat->yatirilacak }}"
                placeholder="Bu ödeme için en fazla {{ $aidat->yatirilacak }} TL yatırılabilir.">
        </div>


        <input type="submit" class="btn btn-primary col-12">


    </form>

</div>
