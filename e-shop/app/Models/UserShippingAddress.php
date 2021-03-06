<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Mar 2019 13:21:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserShippingAddress
 * 
 * @property string $user_id
 * @property string $shipping_address_id
 * 
 * @property \App\Models\ShippingAddress $shipping_address
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class UserShippingAddress extends Eloquent
{
	protected $table = 'user_shipping_address';
	public $incrementing = false;
	public $timestamps = false;

	public function shipping_address()
	{
		return $this->belongsTo(\App\Models\ShippingAddress::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
