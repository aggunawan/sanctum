<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResource;
use App\Models\User;
use App\Http\Requests\RegisterStoreRequest;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request     $request
     * @param  \App\Models\User             $user
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterStoreRequest $request, User $user)
    {
        $createdUser = $user->store($request->validated());

        return new UserResource($createdUser);
    }
}
