<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
	protected $table = 'tasks';
    protected $fillable = ['name' , 'user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
