
<div class="col-12">
  @include('layouts.components.errors')
</div>

<div class="col-6 mt-3 offset-3">
<form enctype="multipart/form-data">

    <div class="form-group">
      <label for="ad">Ad</label>
      <input type="text" name="ad" required class="form-control" id="ad">
    </div>

    <div class="form-group">
      <label for="soyad">Soyad</label>
      <input type="text" name="soyad" required class="form-control" id="soyad">
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" required class="form-control" id="email">
    </div>

    <div class="form-group">
        <label for="email">Email Tekrar</label>
        <input type="email" name="emailtekrar" required class="form-control" id="email">
    </div>

    <div class="form-group">
      <label for="sifre">Sifre</label>
      <input type="password" class="form-control" name="sifre" required id="sifre">
    </div>

    <div class="form-group">
      <label for="sifre">Sifre Tekrar</label>
      <input type="password" class="form-control" name="sifretekrar" required id="sifre">
    </div>

    <div class="form-group">
      <label for="telNo">Telefon</label>
      <input type="tel" class="form-control" name="telNo" required placeholder="{533-333-3333}"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="telNo">
    </div>
    

    <div class="form-group">
      <label for="tcNo">T.C No</label>
      <input type="number" class="form-control" name="tcNo" required min="11" maxlength="11"  id="tcNo">
    </div>

    <div class="form-group">
      <label  for="adres">Ev Adresi</label>
      <input type="text" class="form-control" required name="adres" id="adres">
    </div>

    <label class="d-block">Yetkiler</label>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="ogrenciEkleDuzenle" value="ogrenciekleDuzenle">
      <label class="form-check-label" for="ogrenciEkleDuzenle">Ogrenci Ekle / Duzenle</label>
    </div>
    
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="ogrenciOdaIslemleri" value="ogrenciOdaIslemleri">
      <label class="form-check-label" for="ogrenciOdaIslemleri">Ogrenci Oda İşlemleri</label>
    </div>
    
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="personelEkleDuzenle" value="personelEkleDuzenle">
      <label class="form-check-label" for="personelEkleDuzenle">Personel Ekle / Duzenle</label>
    </div>

    <div class="form-group mt-3">
      <label for="resim">Resim</label>
      <input type="file" class="form-control" name="resim" required accept="image/*" id="resim">
    </div>

    <button type="submit" class="btn btn-primary">Ekle</button>

  </form>
</div>