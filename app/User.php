<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Useful meanings of the validation_state property
     *
     * @var array
     */
    const VERIFICATION_STATE_NAMES = [
        'not verified',
        'verified'
    ];

    /**
     * getting the validation state label for frontend, to be replaced with values from a l10n system
     *
     * @var string
     */
    public function getVerificationState(){
        return self::VERIFICATION_STATE_NAMES[$this->verification_state];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'verification_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
