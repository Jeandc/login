<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\MyResetPassword;
use DB;
use App\Jornada;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table="c001t_usuario";

    protected $primaryKey="ID";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'ID',
        'NB_LOGIN_USUARIO',
        'EMAIL',
        'NB_PASSWORD_USUARIO',
        'ID_ROL',
        'TX_INTENTOS',
        'REMEMBER_TOKEN',
        'UPDATED_AT'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'NB_PASSWORD_USUARIO',
        'REMEMBER_TOKEN', 
    ];

     public function getAuthPassword()
    {
        return $this->NB_PASSWORD_USUARIO;
    }

     /*public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPassword($token));
    }
    public function getEmailForPasswordReset()
    {
        return $this->EMAIL;
    }
    */
    public function roles()
    {
        return $this->belongsTo('App\Rol','ID_ROL');
    }

    public function getMenu()
    { 
         $query=$this->ID_ROL;
            $menu=DB::table('vista_menu_rol')
            ->where('ID','=',$query)
            ->where('TX_ESTATUS','=','ACTIVO')
            ->orderBy('ORDEN','asc')
            ->get();

        return  $menu;
    }

    public function getJornada()
    {
        $jornada=Jornada::where('ID_ESTATUS', 1)->get();

        return $jornada;
    }
}

