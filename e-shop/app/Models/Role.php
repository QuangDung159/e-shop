<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 12 Feb 2019 06:37:37 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Role
 * 
 * @property string $id
 * @property int $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Role extends Eloquent
{
	protected $table = 'role';
	public $incrementing = false;

	protected $casts = [
		'name' => 'int'
	];

	protected $fillable = [
		'name'
	];

	public function users()
	{
		return $this->hasMany(\App\Models\User::class);
	}
}
