
<div class="col-6 offset-3">
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
        <input type="email" name="email" required class="form-control" id="email">
    </div>

    <div class="form-group">
      <label for="sifre">Sifre</label>
      <input type="password" class="form-control" name="sifre" required id="sifre">
    </div>

    <div class="form-group">
      <label for="sifre">Sifre Tekrar</label>
      <input type="password" class="form-control" name="sifre" required id="sifre">
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

    <div class="form-group">
      <label for="odaNo">Oda No</label>
      <input type="number" class="form-control" name="odaNo" required id="odaNo">
    </div>

    <div class="form-group">
      <label for="katNo">Kat No</label>
      <input type="number" class="form-control" name="katNo" required id="katNo">
    </div>

    <div class="form-group">
      <label for="yatakNo">Yatak No</label>
      <input type="number" class="form-control" name="yatakNo" required id="yatakNo">
    </div>

    <div class="form-group">
      <label for="resim">Resim</label>
      <input type="file" class="form-control" name="resim" required accept="image/*" id="resim">
    </div>

    <button type="submit" class="btn btn-primary">Ekle</button>

  </form>
</div>