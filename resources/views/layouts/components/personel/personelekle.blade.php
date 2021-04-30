
@if (session('success'))
<div class="col-md-6 offset-md-3 alert alert-success">
  Öğrenci başarıyla kayıt edildi
</div>
@endif

<div class="col-12">
  @include('layouts.components.errors')
</div>

<div class="col-md-6 mt-3 offset-md-3">
<form method="POST" action="{{route('personel.personelEklePost')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="ad">Ad</label>
      <input type="text" name="ad" value="{{old('ad')}}" required class="form-control" id="ad">
    </div>

    <div class="form-group">
      <label for="soyad">Soyad</label>
      <input type="text" name="soyad" value="{{old('soyad')}}" required class="form-control" id="soyad">
    </div>

    <div class="form-group">
      <label for="mail">Email</label>
      <input type="email" name="mail" value="{{old('mail')}}" required class="form-control" id="mail">
    </div>

    <div class="form-group">
      <label for="telNo">Telefon</label>
      <input type="tel" class="form-control" name="telNo" value="{{old('telNo')}}"  required placeholder="{533-333-3333}" minlength="10" maxlength="10" id="telNo">
    </div>


    <div class="form-group">
      <label for="tcNo">T.C No</label>
      <input type="text" class="form-control" name="tcNo" value="{{old('tcNo')}}" required min="11" maxlength="11"  id="tcNo">
    </div>

    <div class="form-group">
      <label  for="evAdresi">Ev Adresi</label>
      <input type="text" class="form-control" required name="evAdresi" value="{{old('evAdresi')}}" id="evAdresi">
    </div>

    {{-- <label class="d-block">Yetkiler</label>

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
    </div> --}}

    <div class="form-group mt-3">
      <label for="resim">Resim</label>
      <input type="file" class="form-control" name="resim" value="{{old('resim')}}" required accept="image/*" id="resim">
    </div>

    <button type="submit" class="btn btn-primary col-12">Ekle</button>

  </form>
</div>
