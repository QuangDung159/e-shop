<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 15 Feb 2019 13:24:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cart
 * 
 * @property string $id
 * @property float $amount
 * @property string $status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\CartStatus $cart_status
 * @property \Illuminate\Database\Eloquent\Collection $cart_details
 * @property \Illuminate\Database\Eloquent\Collection $transactions
 *
 * @package App\Models
 */
class Cart extends Eloquent
{
	protected $table = 'cart';
	public $incrementing = false;

	protected $casts = [
		'amount' => 'float'
	];

	protected $fillable = [
		'amount',
		'status_id'
	];

	public function cart_status()
	{
		return $this->belongsTo(\App\Models\CartStatus::class, 'status_id');
	}

	public function cart_details()
	{
		return $this->hasMany(\App\Models\CartDetail::class);
	}

	public function transactions()
	{
		return $this->hasMany(\App\Models\Transaction::class);
	}
}
