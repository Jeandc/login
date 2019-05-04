<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VistaMenuRol extends Model
{
   protected $table = "vista_menu_rol";
	
	protected $fillable = [

		'ID',
		'TX_ROL',
		'ID_MENU',
		'TX_TITULO',
		'URL',
		'ORDEN',
		'PADRE',
		'ID_ESTATUS_USUARIO',
		'TX_ESTATUS',
		
	];

}
