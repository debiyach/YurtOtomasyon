@extends('layouts.personel')

@section('content')
    <!-- Button trigger modal -->
    <div class="row">
        <div class="col-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#binaEkleModal">
                Bina Ekle
            </button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#katEkleModal">
                Kat Ekle
            </button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#odaEkleModal">
                Oda Ekle
            </button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#yatakEkleModal">
                Yatak Ekle
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="binaEkleModal" tabindex="-1" aria-labelledby="#binaEkleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="binaEkleModalLabel">Bina Ekleme Formu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="binaEkle">
                        <div class="form-group">
                            <label for="binaAdi">Bina Adını Giriniz:</label>
                            <input type="text" class="form-control" name="binaAdi" id="binaAdi">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                            <button type="submit" class="btn btn-primary">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="katEkleModal" tabindex="-1" aria-labelledby="#katEkleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="katEkleLabel">Kat Ekleme Formu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="katEkle">
                        <div class="form-group">
                            <label for="binaSeciniz">Bina Seçiniz :</label>
                            <select class="form-control bina-select" name="binaNo" id="binaSeciniz"></select>
                        </div>
                        <div class="form-group">
                            <label for="katAdi">Kat Adını Giriniz:</label>
                            <input type="text" class="form-control" name="katAdi" id="katAdi">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                            <button type="submit" class="btn btn-primary">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="odaEkleModal" tabindex="-1" aria-labelledby="#odaEkleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="odaEkleLabel">Kat Ekleme Formu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="odaEkle">
                        <div class="form-group">
                            <label for="binaSecinizs">Bina Seçiniz :</label>
                            <select class="form-control bina-select" name="binaNo" id="binaSecinizs"></select>
                        </div>
                        <div class="form-group">
                            <label for="katSecin">Kat Seçiniz :</label>
                            <select class="form-control" name="katNo" id="katSecin">
                                <option value="null"> Önce Bina Seçiniz</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="katAdi">Oda Numarasını Giriniz:</label>
                            <input type="number" maxlength="6" min="0" class="form-control" name="odaNo" id="odaNo">
                        </div>
                        <div class="form-group">
                            <label for="katAdi">Oda Adını Giriniz:</label>
                            <input type="text" class="form-control" name="odaAdi" id="odaAdi">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                            <button type="submit" class="btn btn-primary">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="yatakEkleModal" tabindex="-1" aria-labelledby="#yatakEkleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="yatakEkleLabel">Kat Ekleme Formu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="yatakEkle">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="yatakBina">Bina Seçiniz:</label>
                                <select class="form-control bina-select" name="binaNo" id="yatakBina">
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="yatakBina">Kat Seçiniz:</label>
                                <select class="form-control" name="katNo" id="yatakKat">
                                    <option value="null">Önce Bina Seçiniz</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="yatakBina">Oda Seçiniz:</label>
                                <select class="form-control" name="odaNo" id="yatakOda">
                                    <option value="null">Önce Kat Seçiniz</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="katAdi">Yatak Numarasını Giriniz:</label>
                                <input type="number" maxlength="6" min="0" class="form-control" name="yatakNo"
                                       id="yatakNo">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="katAdi">Yatak Adını Giriniz:</label>
                                <input type="text" class="form-control" name="yatakAdi" id="yatakAdi">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                            <button type="submit" class="btn btn-primary">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ogrenciYatakEkleModal" tabindex="-1" aria-labelledby="#ogrenciYatakEkleLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ogrenciYatakEkleLabel">Kat Ekleme Formu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ogrenciYatakEkle">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ogrNo">Öğrenci Seçiniz:</label>
                                <select class="form-control bina-select" name="ogrNo" id="ogrNo">
                                </select>
                            </div>
                            <input type="hidden" name="yatakId" id="yatakId">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                            <button type="submit" class="btn btn-primary">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 mt-5">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="yatakBina">Bina Seçiniz:</label>
                    <select class="form-control bina-select" id="yatakBina2">
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="yatakBina">Kat Seçiniz:</label>
                    <select class="form-control" id="yatakKat2">
                        <option value="null">Önce Bina Seçiniz</option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="yatakBina">Oda Seçiniz:</label>
                    <select class="form-control" id="yatakOda2">
                        <option value="null">Önce Kat Seçiniz</option>
                    </select>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12 mt-5">
        <div class="row" id="list"></div>
    </div>

@endsection
@section('script')
    <script>

        function ogrenciKaldir(id) {
            ajaxPostCall('{{route('personel.odaIslemleri.ogrenciYatakKaldir')}}',{ogrid:id},function (data){
                yatakYaz($('#yatakOda2 :selected').val());
                yatakOgrenciGetir(ogrenciOptAdd);
            });
        }

        function yatakOgrenciGetir(callback) {
            $.get('{{route("personel.odaIslemleri.yatakOgrenciGetir")}}', function (data) {
                callback(data);
            });
        }
        $('#ogrenciYatakEkle').submit(function(e){
            e.preventDefault();
            ajaxPostCall('{{route('personel.odaIslemleri.yatakOgrenciEkle')}}',$('#ogrenciYatakEkle').serialize(),function (data){
                yatakYaz($('#yatakOda2 :selected').val());
                yatakOgrenciGetir(ogrenciOptAdd);
                $('.modal').modal('hide');
            });
        });


        function addBed(s) {
            $('#ogrenciYatakEkleModal').modal('show');
            $('#yatakId').val(s)
        }

        function deleteBed(link) {
            $.get(link, function (data) {
                yatakYaz($('#yatakOda2 :selected').val())
            });
        }

        $('#yatakOda2').change(function (e) {
            e.preventDefault();
            yatakYaz(e.target.value);
        })

        function yatakYaz(id) {
            if (id === 'null') return $('#list').html(null);
            $.get('{{route("personel.odaIslemleri.yatakGetir")}}/' + id, function (data) {
                $('#list').html(data);
            })
        }

        $('#yatakKat').change(function (e) {
            yatakKatIslem(e, data => $('#yatakOda').html(data));
        });

        $('#yatakKat2').change(function (e) {
            yatakKatIslem(e, data => $('#yatakOda2').html(data));
        });

        $('#yatakBina').change(function (e) {
            yatakBinaIslem(e, data => $('#yatakKat').html(data));
        });
        $('#yatakBina2').change(function (e) {
            yatakBinaIslem(e, data => $('#yatakKat2').html(data));
        });

        function yatakKatIslem(e, callback) {
            e.preventDefault();
            $.get('{{route("personel.odaIslemleri.odaGetir")}}/' + e.target.value, function (data) {
                odaOptYaz(data, function (data) {
                    callback(data)
                });
            });
        }

        function yatakBinaIslem(e, callback) {
            e.preventDefault();
            if (e.target.value != 'null')
                katGetir(e.target.value, function (data) {
                    katOptionYaz(data, function (d) {
                        callback(d);
                    });
                });
            else {
                $('#yatakKat').html('<option value="null">Önce Bina Seçiniz</option>');
                $('#yatakOda').html('<option value="null">Önce Kat Seçiniz</option>');
            }
        }

        $('#yatakEkle').submit(function (e) {
            e.preventDefault();
            ajaxPostCall('{{route('personel.odaIslemleri.yatakEkle')}}', $('#yatakEkle').serialize(), function (data) {
                writeNot(data);
            });
        });

        $('#binaEkle').submit(function (e) {
            e.preventDefault();
            ajaxPostCall('{{route('personel.odaIslemleri.binaEkle')}}', $('#binaEkle').serialize(), function (data) {
                writeNot(data);
            });
            binaGetir();
        });

        $('#katEkle').submit(function (e) {
            e.preventDefault();
            ajaxPostCall('{{route('personel.odaIslemleri.katEkle')}}', $('#katEkle').serialize(), function (data) {
                writeNot(data);
            });
        });

        $('#odaEkle').submit(function (e) {
            e.preventDefault();
            ajaxPostCall('{{route('personel.odaIslemleri.odaEkle')}}', $('#odaEkle').serialize(), function (data) {
                writeNot(data);
            });
        });


        function writeNot(data) {
            $.notify(data.message, data.type);
            if (data.type === 'success') {
                $('.modal').modal('hide');
            }
        }

        $('#binaSecinizs').change(function (e) {
            e.preventDefault();
            if (e.target.value != 'null')
                katGetir(e.target.value, function (data) {
                    katOptionYaz(data, function (d) {
                        $('#katSecin').html(d);
                    });
                });
        });

        function katGetir(id, callback) {
            $.get('{{route("personel.odaIslemleri.katGetir")}}/' + id, function (data) {
                callback(data);
            })
        }

        function katOptionYaz(katlar, callback) {
            let katOpt = '';
            if (katlar.length > 0) {
                katOpt = '<option value="null">Kat Seçiniz</option>';
                for (const kat of katlar) {
                    katOpt += `<option value="${kat.id}">${kat.katAdi}</option>`;
                }
            } else katOpt = '<option value="null">Binaya Ekli Kat Bulunamadı</option>';
            callback(katOpt);
        }

        function binaGetir() {
            $.get('{{route("personel.odaIslemleri.binaGetir")}}', function (data) {
                binaOptionYaz(data);
            });
        }

        function odaOptYaz(odalar, callback) {
            let odaOpt = '';
            if (odalar.length > 0) {
                odaOpt = '<option value="null">Oda Seçiniz</option>';
                for (const oda of odalar) {
                    odaOpt += `<option value="${oda.id}">${oda.odaAdi} Oda - ${oda.odaNo} Nolu</option>`;
                }
            } else odaOpt = '<option value="null">Listelenecek oda yok</option>';
            callback(odaOpt);
        }

        function binaOptionYaz(binalar) {
            let binaOpt = '<option value="null">Bina Seçiniz</option>';
            for (const bina of binalar) {
                binaOpt += `<option value="${bina.id}">${bina.binaAdi}</option>`;
            }
            $('.bina-select').html(binaOpt);


        }

        function ajaxPostCall(route, data, callback) {
            $.ajax({
                url: route,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}',
                },
                data: data,
                success(data) {
                    callback(data);
                }
            });
        }

        function ogrenciOptAdd(ogrs) {
            let ogrOpt = '';
            if (ogrs.length > 0) {
                ogrOpt = '<option value="null">Yatağa Eklenecek Öğrenciyi Seçiniz</option>';
                for (const ogr of ogrs) {
                    ogrOpt += `<option value="${ogr.id}">${ogr.ad} ${ogr.soyad}</option>`;
                }
            }else ogrOpt = '<option value="null">Yurdunuzda yataksız öğrenci yok</option>';
            $('#ogrNo').html(ogrOpt);
        }

        $(document).ready(function () {
            binaGetir();
            yatakOgrenciGetir(ogrenciOptAdd);
        });

    </script>
@endsection
