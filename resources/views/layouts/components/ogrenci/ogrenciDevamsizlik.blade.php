@php
$devamsizlik = 0;
$izinli = 0;
foreach ($veri as $row) {
    if (!$row['yokla']) {
        $devamsizlik++;
    } else {
        $izinli++;
    }
}
@endphp
<div class="alert alert-info text-uppercase font-weight-bold">KULLANDIGINIZ DEVAMSIZLIK SAYISI <b>{{ $devamsizlik }}
        gün</b></div>

<div class="alert alert-warning mt-3 text-uppercase font-weight-bold">KULLANDIGINIZ İZİN SAYISI <b>{{ $izinli }}
        gün</b>
</div>

<div class="card">
    <h5 class="card-header">Devamsızlık Bilgileri</h5>
    <div class="card-body">
        <div class="table-responsive">
            <table id="usersDatatable" class="table table-striped table-bordered first">
                <thead>
                    <tr>
                        <th>Tür</th>
                        <th>Aciklama</th>
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
