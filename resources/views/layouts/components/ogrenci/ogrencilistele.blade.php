<div class="card">
    <h5 class="card-header">Öğrenci tablo</h5>
    <div class="card-body">
        @php
            $kats = [];
            foreach ($katlar as $kat) {
                $kats[] = $kat->katAdi;
            }
            $katlar = array_unique($kats);
        @endphp
        <div class="table-responsive">
            <table id="usersDatatable" class="table table-striped table-bordered first">
                <thead>

                    <tr>
                        <th>id</th>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>Tc No</th>
                        <th>Blok</th>
                        <th>Kat</th>
                        <th>Oda No</th>
                        <th>İslemler</th>
                    </tr>
                </thead>
                <tfoot>
                    {{-- <th></th>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Tc No</th>
                    <th>
                        <select class="custom-select">
                            <option selected>Hepsi</option>
                            <option value="1">A Blok</option>
                            <option value="2">B Blok</option>
                        </select>
                    </th>
                    <th>
                        <select class="custom-select">
                            <option selected>Hepsi</option>
                            <option value="1">A Blok</option>
                            <option value="2">B Blok</option>
                        </select>
                    </th> --}}

                    <th rowspan="1" colspan="1"></th>
                    <th rowspan="1" colspan="1"></th>
                    <th rowspan="1" colspan="1"></th>
                    <th rowspan="1" colspan="1"></th>
                    <th rowspan="1" colspan="1"></th>
                    <th rowspan="1" colspan="1"></th>
                    <th rowspan="1" colspan="1"><select></th>
                    <th rowspan="1" colspan="1">
                        <select id="katNo" class="form-control">
                            <option value=" ">Tümü</option>
                            @foreach ($katlar as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th rowspan="1" colspan="1"><input type="text" id="odaNo"></th>
                </tfoot>
            </table>
        </div>
    </div>
</div>
