<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property string $cedula
 * @property string $clave
 * @property string $nombre
 * @property string $telefono
 * @property string $email
 * 
 * @property Collection|Gasto[] $gastos
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';
	protected $primaryKey = 'cedula';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'clave',
		'nombre',
		'telefono',
		'email'
	];

	public function gastos()
	{
		return $this->hasMany(Gasto::class);
	}
}
