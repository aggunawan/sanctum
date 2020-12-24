<?php

namespace App\Models;

use App\Enums\Constant;
use App\Traits\Showable;
use App\Traits\Storeable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, Storeable, Showable;

    /**
     * Generated Token
     * 
     * @var string
     */
    public $token;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    /**
     * Do something after create() method is called
     * 
     * @return void
     */
    public function afterStore()
    {
        $this->setToken();
    }

    /**
     * Use email instead of id
     * 
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'email';
    }

    /**
     * Set access_token to $token props
     * 
     * @return self
     */
    public function setToken()
    {
        $this->token = $this->createToken(Constant::TOKEN())->plainTextToken;
        
        return $this;
    }
}
