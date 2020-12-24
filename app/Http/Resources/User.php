<?php

namespace App\Http\Resources;

use App\Enums\Constant;
use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'message' => $this->wasRecentlyCreated ? Constant::HTTP_CREATED_MESSAGE() : Constant::HTTP_SUCCESS_MESSAGE(),
            'code' => $this->wasRecentlyCreated ? Constant::HTTP_CREATED_CODE() : Constant::HTTP_SUCCESS_CODE(),
            'data' => [
                'name' => $this->name,
                'email' => $this->email,
                'token' => $this->token,
            ]
        ];
    }
}
