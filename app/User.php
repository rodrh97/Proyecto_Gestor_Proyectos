<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    //protected $primaryKey = 'num_employee';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

}
