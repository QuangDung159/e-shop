<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 24 Feb 2019 05:23:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ShippingAddress
 * 
 * @property string $id
 * @property int $address_number
 * @property string $street
 * @property string $ward
 * @property string $district
 * @property string $city
 * @property string $nation
 * @property bool $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class ShippingAddress extends Eloquent
{
	protected $table = 'shipping_address';
	public $incrementing = false;

	protected $casts = [
		'address_number' => 'int',
		'is_active' => 'bool'
	];

	protected $fillable = [
		'address_number',
		'street',
		'ward',
		'district',
		'city',
		'nation',
		'is_active'
	];

	public function users()
	{
		return $this->belongsToMany(\App\Models\User::class, 'user_shipping_address');
	}
}
