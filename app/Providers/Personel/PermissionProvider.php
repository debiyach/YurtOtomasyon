<?php

namespace App\Providers\Personel;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class PermissionProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('isAddStudent',function(){
            return "<?php if (json_decode(session()->get('personel')->yetki)->ogrenciEkle === \App\Helpers\Permission::Ekle): ?>";
        });

        Blade::directive('endPerm',function (){
            return "<?php endif; ?>";
        });

        Blade::directive('isAddPersonel',function(){
            return "<?php if (json_decode(session()->get('personel')->yetki)->personelEkle === \App\Helpers\Permission::Ekle): ?>";
        });

    }
}
