<<<<<<< HEAD
<div class="col-12">
    @include('layouts.components.errors')
</div>

@if(!$aidats->count()>0)
    <div class="alert bg-success text-white">
        Ödenecek taksit bulunmamaktadır.
    </div>
@endif
@foreach ($aidats as $item)
    @if (($item->yatirilacak - $item->yatirilan) > 0)
        <a href="{{ Route('ogrenci.aidatOdeme').'/'.$item->id}}" class="uzuncard">
            <h3>{{date('m',strtotime($item->created_at))}}. Ay Aidat Ödemesi</h3>
            <p>{{date('m',strtotime($item->created_at))}} a ait
                <span>{{$item->yatirilacak - $item->yatirilan}} TL</span> tutarında ödeme bulunmaktadır. ödemek için
                lütfen tıklayınız!</p>
        </a>
    @endif
@endforeach
=======
@php
$birsayi = 0;
@endphp
@foreach ($aidats as $item)

    @if ($item->yatirilacak > $item->yatirilan)
        @php
            $birsayi++;
        @endphp
        @if ($item->mevcutAy == 0)

            <a href="{{ Route('ogrenci.aidatOdeme') . '/' . $item->id }}" class="uzuncard mt-4">
                <h3>Önceki Ay'dan ödenmemiş borcunuz bulunmaktadır.</h3>
                <p>Önceki Ay'dan toplam
                    <span> {{ $item->yatirilacak - $item->yatirilan }}
                        TL</span> tutarında ödeme bulunmaktadır. ödemek için lütfen tıklayınız!
                </p>
            </a>
        @else
            <a href="{{ Route('ogrenci.aidatOdeme') . '/' . $item->id }}" class="uzuncard mt-4">
                <h3>{{ date('m', strtotime($item->created_at)) }}. Ay Aidat Ödemesi</h3>
                <p>{{ date('m', strtotime($item->created_at)) }}. Ay'a ait
                    <span>{{ $item->yatirilacak - $item->yatirilan }}
                        TL</span> tutarında ödeme bulunmaktadır. ödemek için lütfen tıklayınız!
                </p>
            </a>
        @endif

    @endif
@endforeach
@if ($birsayi == 0)
    <div class="alert alert-success text-center">SİSTEMDE HERHANGİ BİR BORCUNUZ BULUNMAMAKTADIR</div>
@endif
>>>>>>> dd9f687b1a35dd0a80edb8adb397b3f3aaedebc1
