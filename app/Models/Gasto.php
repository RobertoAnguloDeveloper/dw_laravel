<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gasto
 * 
 * @property int $id
 * @property string $usuario_id
 * @property string $fecha
 * @property string $valorTotalSinIva
 * @property string $ivaTotal
 * @property string $valorTotalConIva
 * @property string $nombreGasto
 * @property string $lugar
 * @property string $descripcion
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Gasto extends Model
{
	protected $table = 'gastos';
	public $timestamps = false;

	protected $fillable = [
		'usuario_id',
		'fecha',
		'valorTotalSinIva',
		'ivaTotal',
		'valorTotalConIva',
		'nombreGasto',
		'lugar',
		'descripcion'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class);
	}
}
