<template>
    <div>

        <div class="row">
            <div class="col-md-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#binaModal">
                    Bina Ekle
                </button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" v-if="binalar.length>0"
                        data-target="#katModal">
                    Kat Ekle
                </button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" v-if="katlar.length>0"
                        data-target="#odaModal">
                    Oda Ekle
                </button>
            </div>
        </div>
        <hr/>

        <form class="form-inline" id="yatakEkle">
            <div class="form-group mb-2">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="odaSecSelect">Oda Seç</label>
                </div>
                <select class="custom-select" name="odaSecSelect" id="odaSecSelect" required @change="odaChanged($event)">
                    <option> Seçiniz</option>
                    <option v-for="(item, key) in odalar" :value="item.id">
                       {{item.binaAdi}} Binası {{ item.katAdi }} Kat {{ item.odaAdi }} Odası
                    </option>
                </select>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="yatakAdi">Yatak Adı</label>
                    <input type="text" name="yatakAdi" id="yatakAdi" required>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary mb-2" @click.enter="yatakEkle($event)">Yatak Ekle</button>
        </form>

        <div class="col-md-12">
            <div id="loads"></div>
            <hr>
            <h1 class="display-6 text-center" v-if="changeYatak.length>0">Yataklar</h1>
            <hr>
            <div class="row">
                <div class="col-md-3 card bg-dark ml-3" v-for="(item,key) in changeYatak">
                    <div class="card-body" v-if="item.ogrenciId">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img :src="fotoYolu+item.yatak_to_ogrenci.foto"
                                 class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4 class="text-white">{{ item.yatak_to_ogrenci.ad }} {{ item.yatak_to_ogrenci.soyad }}</h4>
                                <p class="text-secondary mb-1">{{ item.yatak_to_ogrenci.mail }}</p>
                                <p class="text-muted font-size-sm">Yatak Adı : {{ item.yatakAdi }}</p>
                                <button class="btn btn-outline-danger" @click="ogrenciKaldir(item.ogrenciId)">Kaldır</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" v-else>
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                 class="rounded-circle" width="150">
                            <div class="mt-3">
                                <p class="text-secondary mb-1">Boş Yatak</p>
                                <p class="text-muted font-size-sm">Yatak Adı : {{ item.yatakAdi }}</p>
                                <button class="btn btn-outline-danger" v-if="ogrenciler" @click="yatakKaldir(item.id)">Kaldır</button>
                                <button class="btn btn-outline-success" v-if="ogrenciler" @click="yatakId = item.id" data-toggle="modal" data-target="#ogrenciModal">Ekle</button>
                                <button class="btn btn-outline-danger" v-else>

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-octagon" viewBox="0 0 16 16">
                                        <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                    </svg>

                                     Sorun Oluştu

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="binaModal" tabindex="-1" aria-labelledby="binaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="binaModalLabel">Bina Ekle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="binaEkleForm">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="binaEkleLabel">Bina Adı:</span>
                                    </div>
                                    <input type="text" class="form-control" name="binaAdi" id="binaAdi"
                                           aria-describedby="binaEkleLabel">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                <button type="submit" class="btn btn-primary" @click.enter="binaEkle($event)">
                                    Değişiklieri Kaydet
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="katModal" tabindex="-1" aria-labelledby="katModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="katModalLabel">Kat Ekle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="katEkleForm" v-if="binalar.length>0">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="binaSec">Bina Seçiniz: </label>
                                    <select name="binaNo" class="form-control" @change="alBina($event)">
                                        <option v-if="binalar" v-for="(item,key) in binalar" :value="item.id">
                                            {{ item.binaAdi }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="katEkleLabel">Kat Adı:</span>
                                    </div>
                                    <input type="text" class="form-control" name="katAdi" id="katAdi"
                                           aria-describedby="katEkleLabel">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                <button type="submit" class="btn btn-primary" @click.enter="katEkle($event)">
                                    Değişiklieri Kaydet
                                </button>
                            </div>
                        </form>
                        <div class="alert bg-danger text-white" v-else>Bina Ekleyiniz.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="odaModal" tabindex="-1" aria-labelledby="odaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="odaModalLabel">Oda Ekle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="odaEkleForm" v-if="katlar.length>0">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="binaSec">Bina Seçiniz: </label>
                                    <select name="binaNo" class="form-control" @change="alBinaV2($event)">
                                        <option> Bina Seçiniz</option>
                                        <option v-if="binalar" v-for="(item,key) in binalar" :value="item.id">
                                            {{ item.binaAdi }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" v-show="katlar.length>0">
                                    <label for="katSec">Kat Seçiniz: </label>
                                    <select class="form-control" name="katNo" id="katSec">
                                        <option v-for="(item,key) in katlar" :value="item.id">{{ item.katAdi }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" v-show="katlar.length>0">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="odaEkleLabel">Oda Adı:</span>
                                    </div>
                                    <input type="text" class="form-control" name="odaAdi" id="odaAdi"
                                           aria-describedby="odaEkleLabel">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                <button type="submit" class="btn btn-primary" @click="ekleOda($event)">Değişiklieri
                                    Kaydet
                                </button>
                            </div>
                        </form>
                        <div class="alert bg-danger text-white" v-else>Kat Ekleyiniz.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ogrenciModal" tabindex="-1" aria-labelledby="ogrenciModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ogrenciModalLabel">Öğrenci Yatak Ekle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="ogrenciEkleForm" v-if="ogrenciler.length>0">
                            <input type="hidden" :value="yatakId" name="yatakId">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="binaSec">Öğrenci Seçiniz: </label>
                                    <select name="ogrId" class="form-control">
                                        <option> Öğrenci Seçiniz</option>
                                        <option v-if="ogrenciler" v-for="(item,key) in ogrenciler" :value="item.id">
                                            {{ item.ad }} {{ item.soyad }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                <button type="submit" class="btn btn-primary" @click="ekleOgrenci($event)">Değişiklieri
                                    Kaydet
                                </button>
                            </div>
                        </form>
                        <div class="alert bg-danger text-white" v-else>Yatağı Olmayan Öğrenci Kalmadı.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "binaSelect",
    data: function () {
        return {
            binalar: false,
            katlar: false,
            odalar: false,
            selectBina: false,
            selectKat: false,
            changeYatak: false,
            ogrenciler: false,
            yatakId: false,
            fotoYolu: 'http://localhost:8000/storage/ogrenci/profil/'
        }
    },
    methods: {
        alBina() {
            const getBina = axios({
                url: 'http://localhost:8000/personel/ajax/bina-getir',
                type: 'GET',
                config: {'X-CSRF-TOKEN': $('meta[name=_token]').attr('content')}
            });
            getBina.then((e) => {
                this.binalar = e.data;
                return this.binalar
            });
            getBina.catch(e => $.notify(e.message, "error"));

        },
        alOgrenci() {
            const getBina = axios({
                url: 'http://localhost:8000/personel/ajax/ogrenci-getir',
                type: 'GET',
                config: {'X-CSRF-TOKEN': $('meta[name=_token]').attr('content')}
            });
            getBina.then((e) => {
                this.ogrenciler = e.data;
                return this.ogrenciler
            });
            getBina.catch(e => $.notify(e.message, "error"));

        },
        alKat(id = null) {
            const getKat = axios({
                url: 'http://localhost:8000/personel/ajax/kat-getir',
                type: 'GET',
                config: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
            getKat.then((e) => {
                this.katlar = e.data;
                return this.katlar
            });
            getKat.catch(e => $.notify(e.message, "error"));
        },
        alOda() {
            const odalar = axios({
                url: 'http://localhost:8000/personel/ajax/oda-getir',
                type: 'GET',
                config: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
            odalar.then((e) => {
                this.odalar = e.data;
                return this.odalar
            });
            odalar.catch(e => $.notify(e.message, "error"));
        },
        binaEkle(e) {
            e.preventDefault();
            const setBina = axios({
                url: 'http://localhost:8000/personel/ajax/bina-ekle',
                method: 'POST',
                config: {headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}},
                data: $('#binaEkleForm').serialize()
            });
            setBina.then((e) => {
                if (e.data) {
                    $('#binaEkleForm').trigger("reset");
                    $('.modal').modal('hide');
                    $.notify("Bina Eklendi!", "success");
                }
            });
            setBina.catch(e => $.notify(e.message, "error"));

            this.alBina();
        },
        katEkle(e) {
            e.preventDefault();
            const katEkle = axios({
                url: 'http://localhost:8000/personel/ajax/kat-ekle',
                method: 'POST',
                config: {headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}},
                data: $('#katEkleForm').serialize()
            });
            katEkle.then((e) => {
                if (e.data) {
                    this.alKat();
                    $('#katEkleForm').trigger("reset");
                    $('.modal').modal('hide');
                    $.notify("Oda Eklendi!", "success");
                }
            });
            katEkle.catch(e => $.notify(e.message, "error"));
        },
        alBinaV2(e) {
            this.alBina();
            this.alKat(e.target.value);
            if (this.katlar.length > 0) {
                this.selectBina = true;
            } else $.notify('Binaya Kat Ekli Değil!', "error");
        },
        ekleOda(e) {
            e.preventDefault();
            const setOda = axios({
                url: 'http://localhost:8000/personel/ajax/oda-ekle',
                method: 'POST',
                config: {headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}},
                data: $('#odaEkleForm').serialize()
            });
            setOda.then((e) => {
                if (e.data) {
                    this.alOda();
                    $('#odaEkleForm').trigger("reset");
                    $('.modal').modal('hide');
                    $.notify("Oda Eklendi!", "success");
                }
            });
            setOda.catch(e => $.notify(e.message, "error"));
        },
        odaChanged(e) {
            e.preventDefault();
            const chngdYatak = axios({
                url: 'http://localhost:8000/personel/ajax/yatak-getir/' + e.target.value,
                type: 'GET',
                config: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
            chngdYatak.then((e) => {
                this.changeYatak = e.data;
                return this.changeYatak;
            });
            chngdYatak.catch(e => {
                this.changeYatak = false;
                $.notify(e.message, "error")
            });

        },
        yatakEkle(e){
            e.preventDefault();
            const yatakEkle = axios({
                url: 'http://localhost:8000/personel/ajax/yatak-ekle',
                method: 'POST',
                config: {headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}},
                data: $('#yatakEkle').serialize()
            });
            yatakEkle.then((e) => {
                if (e.data) {
                    const chngdYatak = axios({
                        url: 'http://localhost:8000/personel/ajax/yatak-getir/' + $('#odaSecSelect :selected').val(),
                        type: 'GET',
                        config: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                    });
                    chngdYatak.then((e) => {
                        this.changeYatak = e.data;
                        return this.changeYatak;
                    });
                    chngdYatak.catch(e => $.notify(e.message, "error"));
                    $('#yatakAdi').val("");
                    $.notify("Oda Eklendi!", "success");
                }
            });
            yatakEkle.catch(e => $.notify(e.message, "error"));
        },
        ekleOgrenci(e){
            e.preventDefault();
            const ogrenciEkle = axios({
                url: 'http://localhost:8000/personel/ajax/ogrenci-ekle',
                method: 'POST',
                config: {headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}},
                data: $('#ogrenciEkleForm').serialize()
            });
            ogrenciEkle.then((e) => {
                if (e.data) {
                    $('#ogrenciModal').modal('hide');
                    this.alOgrenci();
                    const chngdYatak = axios({
                        url: 'http://localhost:8000/personel/ajax/yatak-getir/' + $('#odaSecSelect :selected').val(),
                        type: 'GET',
                        config: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                    });
                    chngdYatak.then((e) => {
                        if (e.data) {
                            this.changeYatak = e.data;
                            return this.changeYatak;
                        }
                    });
                    chngdYatak.catch(e => {
                        this.changeYatak = false;
                        $.notify(e.message, "error")
                    });
                }
            });
            ogrenciEkle.catch(e => $.notify(e.message, "error"));
        },
        ogrenciKaldir(id){
            const ogrenciYatakKaldir = axios({
                url: 'http://localhost:8000/personel/ajax/ogrenci-yatak-kaldir',
                method: 'POST',
                config: {headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}},
                data: {ogrıd: id}
            });
            ogrenciYatakKaldir.then((e) => {
                if (e.data) {
                    this.alOgrenci();
                    const chngdYatak = axios({
                        url: 'http://localhost:8000/personel/ajax/yatak-getir/' + $('#odaSecSelect :selected').val(),
                        type: 'GET',
                        config: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                    });
                    chngdYatak.then((e) => {
                        if (e.data) {
                            this.changeYatak = e.data;
                            return this.changeYatak;
                        }
                    });
                    chngdYatak.catch(e => {
                        this.changeYatak = false;
                        $.notify(e.message, "error")
                    });
                }
            });
            ogrenciYatakKaldir.catch(e => $.notify(e.message, "error"));
        },
        yatakKaldir(id){
            const yatakKaldir = axios({
                url: 'http://localhost:8000/personel/ajax/yatak-kaldir',
                method: 'POST',
                config: {headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}},
                data: {yatakId: id}
            });
            yatakKaldir.then((e) => {
                if (e.data) {
                    const chngdYatak = axios({
                        url: 'http://localhost:8000/personel/ajax/yatak-getir/' + $('#odaSecSelect :selected').val(),
                        type: 'GET',
                        config: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                    });
                    chngdYatak.then((e) => {
                        if (e.data) {
                            this.changeYatak = e.data;
                            return this.changeYatak;
                        }
                    });
                    chngdYatak.catch(e => {
                        this.changeYatak = false;
                        $.notify(e.message, "error")
                    });
                }
            });
            yatakKaldir.catch(e => $.notify(e.message, "error"));
        }

    },
    mounted() {
        this.alBina();
        this.alKat();
        this.alOda();
        this.alOgrenci();
    }
}
</script>

<style scoped>
#loads{
    display: none;
    position: absolute;
    background-image: url(http://localhost:8000/assets/images/load.gif);
    background-repeat: no-repeat;
    background-color: rgba(255,255,255,.8);
    width: 75vw;
    height: 75vw;
    z-index: 99;
}
</style>
