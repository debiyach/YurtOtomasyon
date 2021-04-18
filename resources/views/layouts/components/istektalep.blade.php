
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
            <select class="form-control" name="tip" id="tip">
                <option value="sikayet" @if ({{old('tip')}}=="sikayet") selected @endif >sikayet</option>
                <option value="istek" @if ({{old('tip')}}=="istek")selected @endif >istek</option>
            </select>
        </div>
        
        <input type="submit" class="btn btn-primary">
      

    </form>

</div>