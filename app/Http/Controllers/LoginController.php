<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginStoreRequest as Request;
use App\Http\Resources\User as UserResource;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request     $request
     * @param  \App\Models\User             $user
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, User $user)
    {
        $user = $user->show($request->get('email'));
        $user->setToken();

        return new UserResource($user);
    }
}
