<?php

namespace App\Rules;

use App\Models\User;
use Hash;
use Illuminate\Contracts\Validation\Rule;

class UserPassword implements Rule
{
    /**
     * Key to find User object
     * 
     * @var string
     */
    protected $key;

    /**
     * Founded User object
     * 
     * @var \App\Models\User
     */
    protected $user;

    /**
     * Create a new rule instance.
     * @param  string   $key
     * @return void
     */
    public function __construct(string $key)
    {
        $this->key = $key;
        $this->user = (app(User::class))->show($this->key);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Hash::check($value, $this->user->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'password is incorrect.';
    }
}
