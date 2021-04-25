@extends('layouts.personel')

@section('content')
@include('layouts.components.personel.personelyetkilendirme')
@endsection

@section('script')

    <script>
        
        $(document).ready(function () {
           
            $("input[type=checkbox]").click(function () { 
               
               var deger = $(this).attr("value");

               $.ajax({
                   type: "get",
                   url: "eklepersonello.php",
                   data: {
                       "deger"  :deger,
                        "id"    :data['id']    
                    },
                   success: function (response) {
                       
                   }
               });

               alert(deger);

              
           });
        });
    </script>


@endsection
