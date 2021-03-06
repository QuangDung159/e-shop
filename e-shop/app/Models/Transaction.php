<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Mar 2019 13:21:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Transaction
 * 
 * @property string $user_id
 * @property string $cart_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Cart $cart
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Transaction extends Eloquent
{
	protected $table = 'transaction';
	public $incrementing = false;

	public function cart()
	{
		return $this->belongsTo(\App\Models\Cart::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
