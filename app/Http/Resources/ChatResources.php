<?php
namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatResources extends JsonResource
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
            'user_id' => $this->user_id,
            'type'=> $this->type,
            'message'=> $this->message,
            'file'=> get_file($this->file),
            'time' => date('h:i A', strtotime($this->created_at)),
            'date' => date('Y-M-d', strtotime($this->created_at)),
            'user' => new BasicUserResources(User::find($this->user_id)),
            ];
    }
}//end class
