<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Task extends Model
{
	protected $table = 'tasks';
    protected $fillable = ['name' , 'user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function canDelete()
    {
    	$currentUser = Auth::user();
    	if ($this->user_id == $currentUser->id) {
            return true;
        }
        return false;
    }
}
