<?php

namespace App\Http\Resources;

use App\Models\AdImages;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResources extends JsonResource
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
            'id' => $this->id,
            'image' => get_file($this->image),
        ];
    }
}//end fun
