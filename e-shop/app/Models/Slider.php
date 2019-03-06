<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Mar 2019 13:21:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Slider
 * 
 * @property string $id
 * @property string $name
 * @property string $link
 * @property bool $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $path
 *
 * @package App\Models
 */
class Slider extends Eloquent
{
	protected $table = 'slider';
	public $incrementing = false;

	protected $casts = [
		'is_active' => 'bool'
	];

	protected $fillable = [
		'name',
		'link',
		'is_active',
		'path'
	];
}
