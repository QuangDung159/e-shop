<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 15 Feb 2019 13:24:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProductImage
 * 
 * @property string $product_id
 * @property string $image_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Image $image
 * @property \App\Models\Product $product
 *
 * @package App\Models
 */
class ProductImage extends Eloquent
{
	protected $table = 'product_image';
	public $incrementing = false;

	public function image()
	{
		return $this->belongsTo(\App\Models\Image::class);
	}

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}
}
