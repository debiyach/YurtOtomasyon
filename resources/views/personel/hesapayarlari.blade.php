@extends('layouts.personel');

@section('content')
<form>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password">
    </div>

    <div class="form-group">
      <label for="telNo">Telefon</label>
      <input type="tel" class="form-control" placeholder="{533-333-3333} formatında"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="telNo">
    </div>

    <div class="form-group">
      <label for="adres">Ev Adresi</label>
      <input type="text" class="form-control" id="adres">
    </div>
   

    <button type="submit" class="btn btn-primary">Güncelle</button>

  </form>
@endsection
