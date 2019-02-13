<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 12 Feb 2019 06:37:37 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Comment
 * 
 * @property string $id
 * @property string $product_id
 * @property string $user_id
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Product $product
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $replies
 *
 * @package App\Models
 */
class Comment extends Eloquent
{
	protected $table = 'comment';
	public $incrementing = false;

	protected $fillable = [
		'product_id',
		'user_id',
		'content'
	];

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function replies()
	{
		return $this->hasMany(\App\Models\Reply::class);
	}
}