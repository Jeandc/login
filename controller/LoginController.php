<?php

namespace App\Http\Controllers\Auth;
use Auth;
use DB;
use App\Usuario;
use Hash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;



class LoginController extends Controller
//Realizado por Jean Correa
{
    // funcion para inciar sesion
    public function login()
    {
        $credentials = $this->validate(request(), [
            $this -> username() => 'required|string',
            $this -> getAuthpassword() => 'required|string'
        ]);
         $usuario=DB::table('c001t_usuario')
         ->Select('ID', 'ID_NOMINA' ,'NB_LOGIN_USUARIO','ID_ESTATUS', 'TX_INTENTOS','NB_PASSWORD_USUARIO')
         ->where('NB_LOGIN_USUARIO', '=', "$_POST[NB_LOGIN_USUARIO]")
         ->get();

            if (count($usuario)>0)
            {

             if ($usuario[0]->ID_ESTATUS == 1 )  
            {
                // valida si lo datos son correctos crea la sesion
                if (Auth::attempt(['NB_LOGIN_USUARIO'=> $credentials['NB_LOGIN_USUARIO'] , 'password' => $credentials['NB_PASSWORD_USUARIO'] ] )) 
                {
                    $user= Auth::user();
                    $user->TX_INTENTOS = 1;
                    $user->save();
                    //dd($usuario);
                    return view ('template.admin');
                }else{
                     $mensaje = $this -> updateAuthIntentos($usuario[0]);
                            return back()
                                        ->withErrors(['NB_LOGIN_USUARIO' => $mensaje])
                                        ->withinput(request(['NB_LOGIN_USUARIO']));
                    }

                }else{
                     if ($usuario[0]->ID_ESTATUS == 2 )
                    {
                        $mensaje = 'El usuario se encuentra inactivo';
                        return back()
                            ->withErrors(['NB_LOGIN_USUARIO' => $mensaje])
                            ->withinput(request(['NB_LOGIN_USUARIO']));
                    }else{
                          
                        if ($usuario[0]->ID_ESTATUS == 3 )
                        {
                            if (Hash::check($credentials['NB_PASSWORD_USUARIO'], $usuario[0]->NB_PASSWORD_USUARIO)){

                            //dd($usuario);
                            //return (redirect()->route('password.reset'));
                            return Redirect::route('password.reset', array( $usuario[0]->ID));
                             }else{
                                $mensaje = $this -> updateAuthIntentos($usuario[0]);
                                     return back()
                                        ->withErrors(['NB_LOGIN_USUARIO' => $mensaje])
                                        ->withinput(request(['NB_LOGIN_USUARIO']));
                            } 
                        }else{
                            if ($usuario[0]->ID_ESTATUS == 4 )
                            {
                                $mensaje = 'El usuario se encuentra bloqueado';
                                return back()
                                    ->withErrors(['NB_LOGIN_USUARIO' => $mensaje])
                                    ->withinput(request(['NB_LOGIN_USUARIO']));
                            }    
                        }
                    }   
                }
            }else{
                 $mensaje = 'El usuario no existe';
                                return back()
                                    ->withErrors(['NB_LOGIN_USUARIO' => $mensaje])
                                    ->withinput(request(['NB_LOGIN_USUARIO']));
              
            }
        }


     // funcion para cerrar sesion
    public function logout()
    {

    // cierra sesion y devuelve al login 
        Auth::logout();

        return redirect('/');
    }

    public function username()
    {
        return 'NB_LOGIN_USUARIO';
    }

    public function getAuthpassword()
    {
        return 'NB_PASSWORD_USUARIO';
    }
    public function updateAuthIntentos($usuario)

    {
      
        if ($usuario->TX_INTENTOS<4)
        {
                $user= Usuario::find($usuario->ID);
                $intentos = $usuario->TX_INTENTOS + 1;
                 if ($intentos == 4){ 
                    $user->ID_ESTATUS = 4;
                 }
                $user->TX_INTENTOS = $intentos;
                $user->save();
                 //dd($usuario);
                 return 'Error usuario y contraseña no coincide';
        }else{
                return  'Error usuario bloqueado';                       
        }
    }
}


