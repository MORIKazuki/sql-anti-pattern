<?php

namespace App\Providers;

use App\Extension\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class BlueprintServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blueprint::macro('systemstamps', function () {
            $this->timestamp('created_at')->useCurrent()->comment('作成日時');
            $this->integer('created_by')->default(0)->comment('作成者ID');
            $this->timestamp('updated_at')->useCurrent()->comment('更新日時');
            $this->integer('updated_by')->default(0)->comment('更新者ID');
        });

        Blueprint::macro('createstamps', function () {
            $this->timestamp('created_at')->useCurrent()->comment('作成日時');
            $this->integer('created_by')->default(0)->comment('作成者ID');
        });
    }
}
