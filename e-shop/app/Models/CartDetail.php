<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 23 Feb 2019 06:10:21 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CartDetail
 * 
 * @property string $cart_id
 * @property string $product_id
 * @property int $quantity
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Cart $cart
 * @property \App\Models\Product $product
 *
 * @package App\Models
 */
class CartDetail extends Eloquent
{
	protected $table = 'cart_detail';
	public $incrementing = false;

	protected $casts = [
		'quantity' => 'int'
	];

	protected $fillable = [
		'quantity'
	];

	public function cart()
	{
		return $this->belongsTo(\App\Models\Cart::class);
	}

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}
}
