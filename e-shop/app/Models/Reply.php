<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Mar 2019 13:21:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Reply
 * 
 * @property string $id
 * @property string $comment_id
 * @property string $user_id
 * @property string $content
 * @property bool $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Comment $comment
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Reply extends Eloquent
{
	protected $table = 'reply';
	public $incrementing = false;

	protected $casts = [
		'is_active' => 'bool'
	];

	protected $fillable = [
		'comment_id',
		'user_id',
		'content',
		'is_active'
	];

	public function comment()
	{
		return $this->belongsTo(\App\Models\Comment::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
