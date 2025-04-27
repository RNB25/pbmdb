<?php

namespace App\Macros;

use Illuminate\Database\Schema\Blueprint;

class BlueprintMacro
{
    public static function register()
    {
        Blueprint::macro('aktif', function () {
            /** @var \Illuminate\Database\Schema\Blueprint $this */
            $this->boolean('is_aktif')->default(true);
            $this->string('kode_eksternal')->nullable();
            return $this;
        });

        Blueprint::macro('users', function () {
            /** @var \Illuminate\Database\Schema\Blueprint $this */
            $this->unsignedBigInteger('created_by')->nullable();
            $this->unsignedBigInteger('updated_by')->nullable();
            return $this;
        });
    }
}
