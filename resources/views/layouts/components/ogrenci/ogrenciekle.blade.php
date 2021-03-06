@if (session('success'))
    <div class="col-md-6 offset-md-3 alert alert-success">
        Öğrenci başarıyla kayıt edildi
    </div>
@endif

<div class="col-12">

</div>

<div class="col-md-6 mt-3 offset-md-3">
    @include('layouts.components.errors')

    <form enctype="multipart/form-data" method="POST" @if (session()->get('personel')->tip == 'Personel') action="{{ route('personel.ogrenci.ogrenciEklePost') }}">
@else
        action="{{ route('mudur.ogrenci.ogrenciEklePost') }}"> @endif @csrf <div
        class="form-group">
        <label for="ad">Ad</label>
        <input type="text" name="ad" required class="form-control" value="{{ old('ad') }}" id="ad">
</div>

<div class="form-group">
    <label for="soyad">Soyad</label>
    <input type="text" name="soyad" required class="form-control" value="{{ old('soyad') }}" id="soyad">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" required class="form-control" value="{{ old('email') }}" id="email">
</div>

<div class="form-group">
    <label for="telNo">Telefon</label>
    <input type="tel" class="form-control" maxlength="11" name="telNo" value="{{ old('telNo') }}" required
        placeholder="{533-333-3333}" id="telNo">
</div>

<div class="form-group">
    <label for="ucret">Ucret</label>
    <input type="tel" class="form-control" name="ucret" value="{{ old('ucret') }}" required id="ucret">
</div>

<div class="form-group">
    <label for="taksit">Taksit Sayısı</label>
    <input type="tel" class="form-control" name="taksit" value="{{ old('taksit') }}" required id="taksit">
</div>

<div class="form-group">
    <label for="tcNo">T.C No</label>
    <input type="text" class="form-control" name="tcNo" required minlength="11" maxlength="11"
        value="{{ old('tcNo') }}" required id="tcNo">
</div>

<div class="form-group">
    <label for="adres">Ev Adresi</label>
    <input type="text" class="form-control" name="adres" value="{{ old('adres') }}" required id="adres">
</div>

<div class="form-group">
    <label for="resim">Resim</label>
    <input type="file" class="form-control" name="resim" value="{{ old('resim') }}" required accept="image/*"
        id="resim">
</div>

<button type="submit" class="btn btn-primary col-12">Ekle</button>

</form>
</div>
