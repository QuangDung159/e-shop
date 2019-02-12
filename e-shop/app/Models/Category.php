<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 12 Feb 2019 06:37:37 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property string $id
 * @property string $name
 * @property bool $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $sub_categories
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	protected $table = 'category';
	public $incrementing = false;

	protected $casts = [
		'is_active' => 'bool'
	];

	protected $fillable = [
		'name',
		'is_active'
	];

	public function sub_categories()
	{
		return $this->hasMany(\App\Models\SubCategory::class);
	}
}
