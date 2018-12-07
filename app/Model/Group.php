<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	public $timestamps = false;
    public static function getAllItem()
    {
    	return static::all();
    }

    protected $fillable = [
        'name', 'code'
    ];

    public static function getItems()
    {
        return static::withCount('users')->lasted()->paginate(getenv('AD_PAG'));
    }

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }
}