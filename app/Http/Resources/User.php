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
            'message' => Constant::HTTP_CREATED_MESSAGE(),
            'code' => Constant::HTTP_CREATED_CODE(),
            'data' => [
                'name' => $this->name,
                'email' => $this->email,
                'token' => $this->token,
            ]
        ];
    }
}
