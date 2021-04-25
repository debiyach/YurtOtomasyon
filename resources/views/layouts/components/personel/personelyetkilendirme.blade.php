
        <div class="col-md-8 offset-2">
            <div class="col-md-12">
                <div class="input-group mb-3 mt-5">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="personel">Personel Seçin</label>
                    </div>
                    <select class="custom-select" id="personel" onchange="degistir(event)">
                        <option selected>Bir Personel Seçin</option>
                        @foreach($personels as $personel)
                            <option value="{{$personel->id}}">{{$personel->ad}} {{$personel->soyad}}</option>
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

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
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
                                        <td><input value="personelEkleme"  type="checkbox"></td>
                                      </tr>
                                      <tr>
                                          <td>Personel Yetki Düzenleme</td>
                                        <td><input value="personelYetkiDuzenleme" type="checkbox"></td>
                                      </tr>

                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    Oda Yetkileri
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
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
                                        <td><input value="binaEkle" type="checkbox"></td>
                                      </tr>

                                      <tr>
                                          <td>Kat Ekle</td>
                                          <td><input value="katEkle" type="checkbox"></td>
                                      </tr>

                                      <tr>
                                          <td>odaEkle</td>
                                          <td><input value="odaEkle" type="checkbox"></td>
                                      </tr>

                                      <tr>
                                          <td>yatakEkle</td>
                                          <td><input value="yatakEkle" type="checkbox"></td>
                                      </tr>

                                      <tr>
                                          <td>ögrenci Yatak Ekle</td>
                                          <td><input value="ogrenciYatakEkle" type="checkbox"></td>
                                      </tr>

                                      <tr>
                                          <td>ögrenci Yatak Kaldir</td>
                                          <td><input value="ogrenciYatakKaldir" type="checkbox"></td>
                                      </tr>

                                      <tr>
                                        <td>Yatak kaldir</td>
                                        <td><input value="yatakKaldir" type="checkbox"></td>
                                    </tr>


                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>



                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Öğrenci Yetkileri
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionExample">
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
                                        <td><input value="ogrenciEkleme" type="checkbox"></td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>





                </div>


            </div>
        </div>