<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Str;
use Hash;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Usuario;
use Session;
use Illuminate\Auth\Events\PasswordReset;

class ResetPasswordController extends Controller
//Realizado por Jean Correa
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

   /*  protected function resetPassword($user, $password)
    {
        $user->NB_PASSWORD_USUARIO = Hash::make($password);
        //$user->NB_PASSWORD_USUARIO = $password;

        $user->setRememberToken(Str::random(60));
        if ($user->ID_ESTATUS == 4 ){
            $mensaje = 'El usuario se encuentra bloqueado';
                                return back()
                                    ->withErrors(['NB_LOGIN_USUARIO' => $mensaje])
                                    ->withinput(request(['NB_LOGIN_USUARIO']));
        }else{
            
            $user->ID_ESTATUS = 1;
            $user->save();
            //dd($user);
            flash('Su contraseña fue cambiada Exitosamente')->success();

            event(new PasswordReset($user));

            $this->guard()->login($user);
            }
        }   
    }*/
    
    public function password($usuarioid)
    {
        return view('auth.passwords.reset', ['usuarioid' => $usuarioid]);
    }
   
    public function update(Request $request)
    {
        $usuario = Usuario::find($request->USUARIO_ID);
        $rules = [
            'NB_PASSWORD_USUARIO' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ];
        $mensaje = [
            'NB_PASSWORD_USUARIO.required' => 'El campo es requerido',
            'password.requerid' => 'El campo es requerido',
            'password.confirmed' => 'La contraseña no coincide',
            'password.min'=> 'El minimo permitido es de 6 caracteres',
        ];
        $validator = Validator::make($request->all(), $rules, $mensaje);
        if ($validator->fails()){
            
            return (redirect()->route('password.reset', [$usuario->ID]))->withErrors($validator);
        
        }else{
            
            //dd($request);
            //$NB_PASSWORD_USUARIO = Hash::make(Input::get('password'));
            //if ($NB_PASSWORD_USUARIO == Auth::user()->password)
            if (Auth::attempt(['NB_LOGIN_USUARIO'=> $usuario['NB_LOGIN_USUARIO'] , 'password' => $request['NB_PASSWORD_USUARIO'] ] ))
            {   
                $usuario= Auth::user(); 
                $usuario->NB_PASSWORD_USUARIO= Hash::make($request->password);   
                $usuario->ID_ESTATUS = 1;
                $usuario->TX_INTENTOS = 1;         
                $usuario->save();
                     
                //flash('Su contraseña fue cambiada Exitosamente')->success();
                Session::flash('flash_message', 'Su contraseña fue cambiada Exitosamente');
                return view ('template.admin');
            }else{
                return (redirect()->route('password.reset', [$usuario->ID]))->with('message', 'Credenciales incorrectas');
            }
        }
    }

}

