@foreach ($aidats as $item)

    @if ($item->yatirilacak > 0)

        <a href="{{ Route('ogrenci.aidatOdeme') . '/' . $item->id }}" class="uzuncard mt-4">
            <h3>{{ $item->mevcutAy }}. Ay Taksit Ödemesi
                <div class="mt-1"><b>{{ $item->sonOdemeTarihi }} Son Ödeme Tarihi</b></div>
            </h3>

            <p>{{ $item->mevcutAy }}. ay'a ait
                <span> {{ $item->yatirilacak }}
                    TL</span> tutarında ödeme bulunmaktadır. ödemek için lütfen tıklayınız!
            </p>
        </a>

    @endif
@endforeach
