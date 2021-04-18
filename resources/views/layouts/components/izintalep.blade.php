
<div class="col-12">
    @include('layouts.components.errors')
</div>

<div class="col-6 offset-3">

    <form action="">
        
        <div class="form-group">
            <label for="aciklama">Aciklama</label>
            <input type="text" class="form-control" name="aciklama" value="{{old('aciklama')}}" required id="aciklama">
        </div>
      
        <div class="form-group">
            <label for="izinBaslangic">İzin Baslangic</label>
            <input type="date" class="form-control" name="izinBaslangic" value="{{old('izinBaslangic')}}" required id="izinBaslangic">
        </div>
      
        <div class="form-group">
            <label for="izinBitis">İzin Bitis</label>
            <input type="date" class="form-control" name="izinBitis" value="{{old('izinBitis')}}" required id="izinBitis">
        </div>
        <input type="submit" class="btn btn-primary">

    </form>

</div>