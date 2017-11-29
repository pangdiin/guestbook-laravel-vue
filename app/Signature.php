<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
	protected $table = "signatures";
	
    protected $guarded = [];

    public function getAvatarAttribute()
    {
    	return sprintf('https://www.gravatar.com/avatar/%s?s=100', md5($this->email));
    }

    public function scopeIgnoreFlagged($query)
    {
    	return $query->where('flagged_at', null);
    }

    public function flag()
    {
    	return $this->update(['flagged_at' => \Carbon\Carbon::now()]);
    }
}
