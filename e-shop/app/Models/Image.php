<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Mar 2019 13:21:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Image
 * 
 * @property string $id
 * @property string $path
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $galleries
 *
 * @package App\Models
 */
class Image extends Eloquent
{
	protected $table = 'image';
	public $incrementing = false;

	protected $fillable = [
		'path'
	];

	public function galleries()
	{
		return $this->hasMany(\App\Models\Gallery::class);
	}
}
