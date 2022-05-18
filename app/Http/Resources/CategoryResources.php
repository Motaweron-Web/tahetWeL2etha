<?php
namespace App\Http\Resources;

use App\Models\AdImages;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResources extends JsonResource
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
            'title' => $this->title,
            'is_special' => $this->is_special,
            'image' => get_file($this->image),
            'sub_categories' => SubCategoryResources::collection($this->sub_categories),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}//end class
