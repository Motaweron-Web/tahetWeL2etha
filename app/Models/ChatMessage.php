<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $guarded = [];


    public function scopeMineChat($query,$ad_id)
    {
        return $query->where('ad_id',$ad_id)->wherehas('room',function($q) use($ad_id){
            $q->where('ad_id',$ad_id)->where('from_user_id',auth()->user()->id);
        });
    }//end fun

    public function room()
    {
        return $this->belongsTo(ChatRooms::class,'room_id');
    }//end fun


}//end class
