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
use Log;

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

        Log::info('register success for user ' . $this->email);
    }

    /**
     * Do something before save User
     * 
     * @return void
     */
    public function beforeStore()
    {
        $payload = collect([
            'name' => $this->name,
            'email' => $this->email,
        ])->toJson();

        Log::info('register request with payload ' . $payload);

        $this->password = bcrypt($this->password);
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
        Log::info('authorization generated for user ' . $this->email);

        $this->token = $this->createToken(Constant::TOKEN())->plainTextToken;
        
        return $this;
    }
}
