<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 15 Feb 2019 13:24:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Manufacturer
 * 
 * @property string $id
 * @property string $name
 * @property bool $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $products
 *
 * @package App\Models
 */
class Manufacturer extends Eloquent
{
	protected $table = 'manufacturer';
	public $incrementing = false;

	protected $casts = [
		'is_active' => 'bool'
	];

	protected $fillable = [
		'name',
		'is_active'
	];

	public function products()
	{
		return $this->hasMany(\App\Models\Product::class);
	}
}
