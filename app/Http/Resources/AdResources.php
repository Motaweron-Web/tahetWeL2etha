<?php

namespace App\Http\Resources;

use App\Models\AdImages;
use App\Models\AdViews;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;


class AdResources extends JsonResource
{
    public static $wrap = 'ad';
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
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'place_type' => $this->place_type,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'phone_code' => $this->phone_code,
            'phone' => $this->phone,
            'whatsapp' => $this->whatsapp,
            'is_followed' => $this->is_followed,
            'views' => AdViews::where('ad_id', $this->id)->count(),
            'user'=>new BasicUserResources(User::find($this->user_id)),
            'images'=>ImageResources::collection(AdImages::where('ad_id',$this->id)->get()),
            'first_image'=>new ImageResources(AdImages::where('ad_id',$this->id)->first()),
            'category'=>new CategoryResources(Categories::find($this->category_id)),
            'subCategory'=>new CategoryResources(Categories::find($this->sub_category_id)),
            'created_at' => $this->created_at,
        ];
    }
}
