<div class="offset-md-1 col-md-10">
    <div id="binaGoruntule">
        @foreach ($katlar as $kat)
            <div class="kat">
                <span class="katNo">{{ $kat->katAdi }}</span>
                @foreach ($odalar as $oda)

                    @if ($kat->id == $oda->katId)
                        <a href="#" class="oda">
                            <span class="odaNo">No {{ $oda->odaNo }}</span>
                            <div class="yataklar">
                                @foreach ($yataklar as $yatak)

                                    @if ($kat->id == $yatak->katId && $oda->id == $yatak->odaId)
                                        <div class="yatak @if ($yatak->ogrenciId == null) bg-danger @endif">{{ $yatak->yatakNo }}
                                        </div>

                                    @endif

                                @endforeach

                            </div>
                            <div class="ogrenciler">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Yatak No</th>
                                            <th scope="col">Öğrenci</th>
                                            <th>Resim</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ogrenciler as $ogrenci)
                                            @if ($ogrenci->odaNo == $oda->id)
                                                <tr>
                                                    <th>{{ $ogrenci->yatakNo }}</th>
                                                    <td>{{ $ogrenci->ad }}</td>
                                                    <td>Resim</td>
                                                </tr>
                                            @endif

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </a>

                    @endif

                @endforeach

            </div>
        @endforeach


    </div>
</div>
