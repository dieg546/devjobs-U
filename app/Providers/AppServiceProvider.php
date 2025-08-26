<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        VerifyEmail::toMailUsing(function($notifiable,$url){

            return (new MailMessage)->subject('Verificar Cuenta')->
            line('Ya estamos casi listos, solo debes presionar el boton para verificar tu cuenta.')
            ->action('Confirmar Cuenta',$url);

        });

    }
}
