<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 12 Feb 2019 06:37:37 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $products
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

	public function products()
	{
		return $this->belongsToMany(\App\Models\Product::class, 'product_image')
					->withTimestamps();
	}
}
