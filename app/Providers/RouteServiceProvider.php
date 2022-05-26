<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{


    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    public static function HOME($user, $request=null){
        switch($user->sezione_appartenenza){
            case 'incorporamento': break; //non registrato
            case 'corsi': 
                switch($user->tipo_utente){
                    case '0':
                        return view('auth.register')->with(["standby" => "Il tuo account non è stato ancora attivato."]);
                    case '1':
                        switch($user->comando_appartenenza){
                            case '24_NMRS': 
                                return redirect(route('standby'));
                            case '23_NMRS': 
                                return redirect(route('standby'));
                            case '22_NMRS':
                                if(!Auth::user()){
                                    $request->authenticate();
                                    $request->session()->regenerate();
                                }
                                return redirect()->intended(route('homeCorsiAdmin22NMRS'));
                            case 'vfp4': 
                                return redirect(('standby'));
                            case 'vfp1': 
                                return redirect(route('standby'));
                        } 
                    case '2': 
                        switch($user->comando_appartenenza){
                            case '24_NMRS': 
                                return redirect(route('standby'));
                            case '23_NMRS': 
                                return redirect(route('standby'));
                            case '22_NMRS':
                                if(!Auth::user()){
                                    $request->authenticate();
                                    $request->session()->regenerate();
                                }
                                return redirect()->intended(route('homeCorsiAdminJunior22NMRS'));
                            case 'vfp4': 
                                return redirect(route('standby'));
                            case 'vfp1': 
                                return redirect(route('standby'));
                        } 
                        

                    case '3': break;
                }
                //admin
            case 'vestiario': break; //admin junior
            case 'sanitaria': break; //addetto
        }
    }
}
