<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 24 Feb 2019 05:23:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SubCategory
 * 
 * @property string $id
 * @property string $name
 * @property string $category_id
 * @property bool $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Category $category
 * @property \Illuminate\Database\Eloquent\Collection $products
 *
 * @package App\Models
 */
class SubCategory extends Eloquent
{
	protected $table = 'sub_category';
	public $incrementing = false;

	protected $casts = [
		'is_active' => 'bool'
	];

	protected $fillable = [
		'name',
		'category_id',
		'is_active'
	];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
	}

	public function products()
	{
		return $this->hasMany(\App\Models\Product::class);
	}
}
