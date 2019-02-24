<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 24 Feb 2019 05:23:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Gallery
 * 
 * @property string $product_id
 * @property string $image_id
 * @property bool $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Image $image
 * @property \App\Models\Product $product
 *
 * @package App\Models
 */
class Gallery extends Eloquent
{
	protected $table = 'gallery';
	public $incrementing = false;

	protected $casts = [
		'is_active' => 'bool'
	];

	protected $fillable = [
		'is_active'
	];

	public function image()
	{
		return $this->belongsTo(\App\Models\Image::class);
	}

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}
}
