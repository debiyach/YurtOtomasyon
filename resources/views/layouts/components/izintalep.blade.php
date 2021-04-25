
<div class="col-12">
    @include('layouts.components.errors')
</div>

<div class="col-md-6 offset-md-3">

    <form method="POST" action="{{route('ogrenci.izinTalepPost')}}">
        @csrf
        <div class="form-group">
            <label for="aciklama">Açıklama</label>
            <textarea name="aciklama" class="form-control" id="aciklama" cols="30" required rows="5">{{ old('aciklama') }}</textarea>
        </div>

        <div class="form-group">
            <label for="aciklama">Tarih</label>
            <input type="text" class="form-control" name="tarih" value="{{ old('tarih') }}" />
        </div>


        <input type="submit" class="btn btn-primary col-12">
    </form>

</div>
