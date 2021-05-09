@foreach ($aidats as $item)
@if (($item->yatirilacak - $item->yatirilan) > 0)
<a href="{{ Route('ogrenci.aidatOdeme').'/'.$item->id}}" class="uzuncard">
    <h3>{{date('m',strtotime($item->created_at))}}. Ay Aidat Ödemesi</h3>
    <p>{{date('m',strtotime($item->created_at))}} a ait <span>{{$item->yatirilacak - $item->yatirilan}} TL</span> tutarında ödeme bulunmaktadır. ödemek için lütfen tıklayınız!</p>
</a>
@endif
@endforeach