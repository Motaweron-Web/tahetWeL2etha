<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JWTAuth;

class UserResources extends JsonResource
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
            'user'=>[
                'id'=>$this->id,
                'first_name'=>$this->first_name,
                'last_name'=>$this->last_name,
                'phone_code'=>$this->phone_code,
                'phone'=>$this->phone,
                'email'=>$this->email,
                'image'=>get_file($this->image),
            ],
            'access_token'=>'Bearer '.$this->token??'',
            'token_type'=>'bearer'
        ];
    }
}
