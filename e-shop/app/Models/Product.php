<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 24 Feb 2019 05:23:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Product
 * 
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $thumbnail
 * @property float $price
 * @property int $buyed
 * @property int $views
 * @property int $rate
 * @property string $sub_category_id
 * @property bool $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $manufacturer_id
 * 
 * @property \App\Models\Manufacturer $manufacturer
 * @property \App\Models\SubCategory $sub_category
 * @property \Illuminate\Database\Eloquent\Collection $cart_details
 * @property \Illuminate\Database\Eloquent\Collection $comments
 * @property \Illuminate\Database\Eloquent\Collection $galleries
 *
 * @package App\Models
 */
class Product extends Eloquent
{
	protected $table = 'product';
	public $incrementing = false;

	protected $casts = [
		'price' => 'float',
		'buyed' => 'int',
		'views' => 'int',
		'rate' => 'int',
		'is_active' => 'bool'
	];

	protected $fillable = [
		'name',
		'description',
		'thumbnail',
		'price',
		'buyed',
		'views',
		'rate',
		'sub_category_id',
		'is_active',
		'manufacturer_id'
	];

	public function manufacturer()
	{
		return $this->belongsTo(\App\Models\Manufacturer::class);
	}

	public function sub_category()
	{
		return $this->belongsTo(\App\Models\SubCategory::class);
	}

	public function cart_details()
	{
		return $this->hasMany(\App\Models\CartDetail::class);
	}

	public function comments()
	{
		return $this->hasMany(\App\Models\Comment::class);
	}

	public function galleries()
	{
		return $this->hasMany(\App\Models\Gallery::class);
	}
}
