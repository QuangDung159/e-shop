<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 24 Feb 2019 05:23:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property string $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $full_name
 * @property string $role_id
 * @property string $phone
 * @property \Carbon\Carbon $dob
 * @property bool $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $point
 * 
 * @property \App\Models\Role $role
 * @property \Illuminate\Database\Eloquent\Collection $comments
 * @property \Illuminate\Database\Eloquent\Collection $replies
 * @property \Illuminate\Database\Eloquent\Collection $transactions
 * @property \Illuminate\Database\Eloquent\Collection $shipping_addresses
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $table = 'user';
	public $incrementing = false;

	protected $casts = [
		'is_active' => 'bool',
		'point' => 'int'
	];

	protected $dates = [
		'dob'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'email',
		'password',
		'full_name',
		'role_id',
		'phone',
		'dob',
		'is_active',
		'point'
	];

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class);
	}

	public function comments()
	{
		return $this->hasMany(\App\Models\Comment::class);
	}

	public function replies()
	{
		return $this->hasMany(\App\Models\Reply::class);
	}

	public function transactions()
	{
		return $this->hasMany(\App\Models\Transaction::class);
	}

	public function shipping_addresses()
	{
		return $this->belongsToMany(\App\Models\ShippingAddress::class, 'user_shipping_address');
	}
}
