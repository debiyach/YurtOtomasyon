<div class="col-md-8 offset-2">
    <div class="col-md-12">
        <div class="input-group mb-3 mt-5">
            <div class="input-group-prepend">
                <label class="input-group-text" for="personel">Personel Seçin</label>
            </div>
            <select class="custom-select" id="personel" onchange="degistir(event)">
                <option selected>Bir Personel Seçin</option>
                @foreach ($personels as $personel)
                    <option value="{{ $personel->id }}">{{ $personel->ad }} {{ $personel->soyad }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-12">
        <div class="accordion" id="accordionExample">


            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Personel Yetkileri
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Yetki Adı</th>
                                    <th>Yetki Durumu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Personel Ekleme</td>
                                    <td><input id="personelEkle" type="checkbox"></td>
                                </tr>
                                <tr>
                                    <td>Personel Yetki Düzenleme</td>
                                    <td><input id="personelYetkiDuzenle" type="checkbox"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Oda Yetkileri
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Yetki Adı</th>
                                    <th>Yetki Durumu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bina Ekle</td>
                                    <td><input id="binaEkle" type="checkbox"></td>
                                </tr>

                                <tr>
                                    <td>Kat Ekle</td>
                                    <td><input id="katEkle" type="checkbox"></td>
                                </tr>

                                <tr>
                                    <td>odaEkle</td>
                                    <td><input id="odaEkle" type="checkbox"></td>
                                </tr>

                                <tr>
                                    <td>yatakEkle</td>
                                    <td><input id="yatakEkle" type="checkbox"></td>
                                </tr>

                                <tr>
                                    <td>ögrenci Yatak Ekle</td>
                                    <td><input id="ogrenciYatakEkle" type="checkbox"></td>
                                </tr>

                                <tr>
                                    <td>ögrenci Yatak Kaldir</td>
                                    <td><input id="ogrenciYatakKaldir" type="checkbox"></td>
                                </tr>

                                <tr>
                                    <td>Yatak kaldir</td>
                                    <td><input id="yatakKaldir" type="checkbox"></td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Öğrenci Yetkileri
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Yetki Adı</th>
                                    <th>Yetki Durumu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Öğrenci Ekleme</td>
                                    <td><input id="ogrenciEkle" type="checkbox"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#maas" aria-expanded="true" aria-controls="collapseOne">
                            Personel Maaşı
                        </button>
                    </h2>
                </div>

                <div id="maas" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Güncel Maaş</th>
                                    <th>Yeni Maaş</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td><input id="personelEkle" type="text"></td>
                                    <td>
                                        <div class="btn btn-success">Güncelle</div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>





        </div>


    </div>
</div>
