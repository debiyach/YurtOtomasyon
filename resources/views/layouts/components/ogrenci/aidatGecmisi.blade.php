<div class="card">
    <h5 class="card-header">Ödeme Geçmişi</h5>
    <div class="card-body">
        <div class="table-responsive">
            <table id="usersDatatable" class="table table-striped table-bordered first">
                <thead>
                    <tr>
                        <th>Taksit</th>
                        <th>Aciklama</th>
                        <th>Yatırılan Ücret</th>
                        <th>Tarih</th>
                    </tr>
                </thead>
                <tfoot>
                    <th rowspan="1" colspan="1">
                        <select>
                    </th>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@php
$toplam = 0;
foreach ($veri as $row) {
    $toplam += $row['yatirilacak'];
}
@endphp



<div class="alert alert-warning text-center p-4">
    TAKSİTLER
    <div><b>KALAN BORÇ {{ $toplam }} TL</b></div>

</div>


<div class="card">
    <h5 class="card-header">Taksitler</h5>
    <div class="card-body">
        <div class="table-responsive">
            <table id="taksitler" class="table table-striped table-bordered first">
                <thead>
                    <tr>
                        <th>Taksit</th>
                        <th>Durum</th>
                        <th>Kalan</th>
                    </tr>
                </thead>
                <tfoot>
                    <th rowspan="1" colspan="1">
                    </th>
                    <th rowspan="1" colspan="1">
                        <select>
                    </th>
                </tfoot>
            </table>
        </div>
    </div>
</div>
