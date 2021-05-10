@foreach ($aidats as $item)

    @if ($item->yatirilacak - $item->yatirilan > 0)

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
