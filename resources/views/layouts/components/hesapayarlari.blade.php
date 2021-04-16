
<div class="col-12">
  @include('layouts.components.errors')
</div>

<div class="col-6 offset-3">
  <form>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" @if(session()->get('personel')) value="{{session()->get('personel')->mail}}"  @elseif(session()->get('ogrenci')) value="{{session()->get('ogrenci')->mail}}" @endif aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password">
      </div>
      <div class="form-group">
        <label for="telNo">Telefon</label>
        <input type="tel" class="form-control" @if(session()->get('personel')) value="{{session()->get('personel')->telNo}}"  @elseif(session()->get('ogrenci')) value="{{session()->get('ogrenci')->telNo}}" @endif placeholder="{533-333-3333} formatında"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="telNo">
      </div>
      <div class="form-group">
        <label for="adres">Ev Adresi</label>
        
        <input type="text" 
        
        @if (session()->get('personel')) value="{{ session()->get('personel')->evAdresi }}"
            
        @elseif(session()->get('ogrenci')) value="{{ session()->get('ogrenci')->evAdresi }}"
        
        @endif class="form-control" id="adres">
      </div>

      <button type="submit" class="btn btn-primary d-block">Güncelle</button>

  </form>
</div>