
<div class="col-12">
    @include('layouts.components.errors')
</div>

<div class="col-md-6 offset-md-3">

    <form action="">
        
        <div class="form-group">
            <label for="aciklama">Açıklama</label>
            <textarea name="aciklama" class="form-control" id="aciklama" cols="30" required rows="5">{{ old('aciklama') }}</textarea>
        </div>
      
        <div class="form-group">
            <label for="izinBaslangic">İzin Baslangıç</label>
            <input type="date" class="form-control" name="izinBaslangic" value="{{old('izinBaslangic')}}" required id="izinBaslangic">
        </div>
      
        <div class="form-group">
            <label for="izinBitis">İzin Bitiş</label>
            <input type="date" class="form-control" name="izinBitis" value="{{old('izinBitis')}}" required id="izinBitis">
        </div>

        <input type="submit" class="btn btn-primary col-12">
    </form>

</div>