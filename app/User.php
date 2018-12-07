<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'fullname', 'address', 'active', 'email_verified_at', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $cast = [
        'active' => 'boolean'
    ];

    protected $appends = ['avatar_user'];

    public function getAvatarUserAttribute()
    {
        return (!is_null($this->avatar) && !empty($this->avatar)) ? $this->avatar : 'logo_default.png';
    }

    public static function getItems($with = [])
    {
        return static::with($with)->latest()->paginate(getenv('AD_PAG'));
    }

    public function groups()
    {
        return $this->belongsToMany('App\Model\Group');
    }

    public function phoneNumber()
    {
        return $this->hasOne('App\Model\PhoneNumber');
    }

    public function search($q, $group_id)
    {
        $result = $this->with('groups', 'phoneNumber');
        if (!is_null($group_id)) {
            $result->whereHas('groups', function ($query) use ($group_id) {
                $query->where('group_id', $group_id);
            });
        }
        return $result->latest()
        ->where(function ($query) use ($q) {
            $query->where('name', 'like', "%$q%")
            ->orWhere('email', 'like', "%$q%")
            ->orWhere('fullname', 'like', "%$q%");
        })
        ->paginate(getenv('AD_PAG'));
    }
}
