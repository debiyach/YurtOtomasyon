
<div class="col-12">
  @include('layouts.components.errors')
</div>

<div class="col-sm-8 offset-1 offset-sm-2 ">
  

    <div class="d-flex ">
      
    
      <div class="col-5">
        <form>
          <div class="form-group">
            <label for="mail">Email</label>
            <input type="mail" class="form-control" id="mail" @if(session()->get('personel')) value="{{session()->get('personel')->mail}}"  @elseif(session()->get('ogrenci')) value="{{session()->get('ogrenci')->mail}}" @endif aria-describedby="emailHelp">
          </div>
          
          <div class="form-group">
            <label for="telNo">Telefon</label>
            <input type="tel" class="form-control col-12" id="telNo" name='telNo' @if(session()->get('personel')) value="{{session()->get('personel')->telNo}}"  @elseif(session()->get('ogrenci')) value="{{session()->get('ogrenci')->telNo}}" @endif placeholder="{533-333-3333} formatında"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" >
          </div>
    
          <div class="form-group">
            <label for="adres">Ev Adresi</label>
            
            <input type="text" name="evAdresi" 
            
            @if (session()->get('personel')) value="{{ session()->get('personel')->evAdresi }}"
                
            @elseif(session()->get('ogrenci')) value="{{ session()->get('ogrenci')->evAdresi }}"
            
            @endif class="form-control" id="adres">
          </div>
    
          <div class="form-group">
            <label for="sifre">Şifre</label>
            <input type="password" name="sifre" class="form-control" id="sifre">
          </div>
          
          <button type="submit" class="btn btn-primary mt-5  col-12">Güncelle</button>
        </form>
      </div>
    
      
      <div class="col-5 h-100 align-self-end">
        <form class="" action="">
          <div class="form-group">
            <label for="sifre">Şuanki Şifreniz</label>
            <input type="password"  name="sifre" class="form-control" id="sifre">
          </div>

          <div class="form-group">
            <label for="yeniSifre">Yeni Şifre</label>
            <input type="password" value="{{old('yeniSifre')}}" name="yeniSifre" class="form-control" id="yeniSifre">
          </div>
    
          <div class="form-group">
            <label for="yeniSifreTekrar">Yeni Şifre Tekrarı</label>
            <input type="password" value="{{old('yeniSifreTekrar')}}" name="yeniSifreTekrar" class="form-control" id="yeniSifreTekrar">
          </div>
          
          <button type="submit" class="btn btn-primary mt-5 col-12">Güncelle</button>
        </form>
      </div>

    </div>



</div>