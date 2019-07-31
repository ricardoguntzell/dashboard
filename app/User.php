<?php

namespace Dashboard;

use Dashboard\Helpers\HelperConsistency;
use Dashboard\Support\Cropper;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        //Data
        'name',
        'email',
        'password',
        'url_friendly',
        'genre',
        'document',
        'date_of_birth',
        'cover',

        //Address
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',

        //Contact
        'telephone',
        'cell',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function UserUrlFriendly()
    {
        $this->attributes['url_friendly'] = str_slug($this->attributes['name'] . '-' . $this->attributes['id']);
    }

    public function scopeUsersByState()
    {
        $usersByState = DB::table('users AS u')
            ->select(DB::raw('u.state AS label, COUNT(state) AS value'))
            ->groupBy('state')
            ->get();

        return $usersByState->toArray();
    }

    public function getUrlCoverAttribute()
    {
        if (!empty($this->cover)) {
            return Storage::url(Cropper::thumb($this->cover, 500, 500));
        }

        return '';
    }

    public function setDocumentAttribute($value)
    {
        $this->attributes['document'] = HelperConsistency::clearField($value);
    }

    public function getDocumentAttribute($value)
    {
        return substr($value, 0, 3) . '.' .
            substr($value, 3, 3) . '.' .
            substr($value, 6, 3) . '-' .
            substr($value, 9, 2);
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = HelperConsistency::convertStringToDate($value);
    }

    public function getDateOfBirthAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function setZipcodeAttribute($value)
    {
        $this->attributes['zipcode'] = HelperConsistency::clearField($value);
    }

    public function setTelephoneAttribute($value)
    {
        $this->attributes['telephone'] = HelperConsistency::clearField($value);
    }

    public function setCellAttribute($value)
    {
        $this->attributes['cell'] = HelperConsistency::clearField($value);
    }

    public function setPasswordAttribute($value)
    {
        if (empty($value)) {
            unset($this->attributes['password']);
            return;
        }

        $this->attributes['password'] = bcrypt($value);
    }
}
