<div class="col-12 col-md-6 offset-md-3">
    <div class="col-12">
        @include('layouts.components.errors')
    </div>

    <form method="POST" id="credit" action="">

        @csrf

        <div class="form-group">
            <label for="kartNo">Kredi Kart No</label>
            <input type="tel" id="kartNo" name="kartNo" class="form-control cc-number" maxlength="19"
                placeholder="xxxx xxxx xxxx xxxx">
        </div>

        <div class="form-group">
            <label for="tarih">Son Kullanma Tarihi</label>
            <input type="tel" id="tarih" name="sonKullanmaTarihi" class="form-control cc-expires" maxlength="7"
                placeholder="01/11">
        </div>

        <div class="form-group">
            <label for="cvcNo">Kart CVC</label>
            <input type="tel" id="cvcNo" name="cvc" class="form-control cc-cvc" maxlength="3" placeholder="111">
        </div>

        <div class="form-group">
            <label for="aciklama">Yatırılacak Tutar</label>
            <input type="tel" name="cvc" class="form-control cc-cvc" placeholder="TL">
        </div>

        <div class="form-group">
            <label for="aciklama">Yatırılacak Ay</label>
            <select class="form-control" name="tip" id="tip">
                <option>Ay seç</option>
                <option value="1">Haziran - 415 TL</option>
            </select>
        </div>

        <input type="submit" class="btn btn-primary col-12">


    </form>

</div>
