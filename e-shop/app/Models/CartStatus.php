<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 12 Feb 2019 06:37:37 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CartStatus
 * 
 * @property string $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $carts
 *
 * @package App\Models
 */
class CartStatus extends Eloquent
{
	protected $table = 'cart_status';
	public $incrementing = false;

	protected $fillable = [
		'name'
	];

	public function carts()
	{
		return $this->hasMany(\App\Models\Cart::class, 'status_id');
	}
}
