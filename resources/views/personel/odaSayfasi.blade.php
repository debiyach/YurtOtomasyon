@extends('layouts.personel')

@section('content')

    <div class="row">
        <div class="col-md-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#binaModal">
                Bina Ekle
            </button>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#katModal">
                Kat Ekle
            </button>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-primary popupShow" data-tip="odaEkle">
                Oda Ekle
            </button>
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
                    <form id="katEkleForm">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="binaSec">Bina Seçiniz: </label>
                                <select class="form-control" name="binaNo" id="binaSec">
                                    <option checked>Seçiniz</option>
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
                            <button type="submit" class="btn btn-primary modalOkBtn">Değişiklieri Kaydet</button>
                        </div>
                    </form>
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
                            <button type="submit" class="btn btn-primary modalOkBtn">Değişiklieri Kaydet</button>
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
                    <form id="katEkleForm">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="binaSec">Bina Seçiniz: </label>
                                <select class="form-control" name="binaNo" id="binaSec">
                                    <option checked>Seçiniz</option>
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
                            <button type="submit" class="btn btn-primary modalOkBtn">Değişiklieri Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script>

        $('.popupShow').click(function (e) {
            e.preventDefault();
            let tip = $(this).data('tip');
            switch (tip) {
                case 'binaEkle':
                    break;
                case 'katEkle':
                    break;
                case 'odaEkle':

                    break;
                default:
                // code block
            }
            $('.modal').modal();
        });


    </script>
@endsection
