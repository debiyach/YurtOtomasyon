
<div class="col-12">
    @include('layouts.components.errors')
</div>

<div class="col-12 col-md-6 offset-md-3">

    <form method="POST" action="{{route('ogrenci.istekSikayetPost')}}">

        @csrf

        <div class="form-group">
            <label for="aciklama">Açıklama</label>
            <textarea name="aciklama" class="form-control" id="aciklama" cols="30" required rows="5">{{ old('aciklama') }}</textarea>
        </div>

        <div class="form-group">
            <select class="form-control" name="tip" id="tip">
                <option value="sikayet" @if (old('tip')=="sikayet") selected @endif >Şikayet</option>
                <option value="istek" @if (old('tip')=="istek")selected @endif >İstek</option>
                <option value="ariza" @if (old('tip')=="ariza")selected @endif >Arıza Bildirimi</option>
            </select>
        </div>

        <input type="submit" class="btn btn-primary col-12">


    </form>

</div>
