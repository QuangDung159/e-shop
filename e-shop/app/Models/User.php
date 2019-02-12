<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 12 Feb 2019 06:37:37 +0000.
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
 * @property string $role_id
 * @property string $phone
 * @property string $shiping_address_id
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
		'role_id',
		'phone',
		'shiping_address_id',
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
}
