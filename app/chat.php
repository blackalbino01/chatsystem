<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class chat extends Model
{
    //
    protected $fillable = ['message'];

    
	/**
	 * A message belong to a user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function users()
	{
	  return $this->belongsTo(User::class,'user_id');
	}
}
