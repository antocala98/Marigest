<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {   
        $user=User::where('email', '=', $request->email)->first();
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
                                $request->authenticate();
                                $request->session()->regenerate();
                                return redirect()->intended(route('homeCorsiAdmin22NMRS'));
                            case 'vfp4': 
                                return redirect(route('standby'));
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
                                $request->authenticate();
                                $request->session()->regenerate();
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

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
