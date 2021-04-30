@extends('layouts.personel')

@section('content')
@include('layouts.components.personel.personelyetkilendirme')
@endsection

@section('script')

    <script>
        
        
        function degistir(e) { 
            e.preventDefault();
            var item = e.target.value;

            $.ajax({
                type: "get",
                url: "{{ route('personel.personelYetkiGetir') }}/"+item,
                
                success: function (data) {
                    data = JSON.parse(data);
                    //console.log(data);
                    data.forEach((key,value) => {
                        if(item)
                            $('#'+item).checked;
                        else 
                            $('#'+item).notChecked;
                    });
                    
                    
                }
            });
            
        }
    </script>


@endsection
