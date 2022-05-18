<?php
namespace App\Http\Resources;

use App\Models\Ad;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResources extends JsonResource
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
            'to_user_id' => $this->to_user_id,
            'from_user_id' => $this->from_user_id,
            'ad_id' => $this->ad_id,
            'ad' => new AdResources(Ad::find($this->ad_id)),
            'to_user' => new BasicUserResources(User::find($this->to_user_id)),
            'from_user' => new BasicUserResources(User::find($this->from_user_id)),
            'messages'=>ChatResources::collection(ChatMessage::where('room_id',$this->id)->latest()->get()),
        ];
    }
}//end class
