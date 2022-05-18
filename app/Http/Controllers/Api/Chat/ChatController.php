<?php

namespace App\Http\Controllers\Api\Chat;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChatResources;
use App\Http\Resources\RoomResources;
use App\Models\Ad;
use App\Models\ChatMessage;
use App\Models\ChatRooms;
use App\Traits\DefaultImage;
use App\Traits\FirebaseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ChatController extends Controller
{
    use DefaultImage,FirebaseNotification;
    public function index(Request $request)
    {
        $rules = [
            'ad_id' => ["nullable",Rule::exists('ads','id')->where(function ($query) {
                $query->where('user_id','!=',auth()->user()->id);
            })],
            'room_id' => ["required_if:ad_id,==,null",Rule::exists('chat_rooms','id')],
        ];
        $validator = Validator::make($request->all(), $rules, [
            'ad_id.exists' => '411',
            'room_id.exists' => '412',
        ]);
        if ($validator->fails()) {
            $errors = collect($validator->errors())->flatten(1)[0];
            if (is_numeric($errors)) {
                $errors_arr = [
                    '411' => 'Failed,ad not found',
                    '412' => 'Failed,room not found',
                ];
                $code = collect($validator->errors())->flatten(1)[0];
                return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
            }
            return helperJson(null, $validator->errors(), 422);
        }
        if ($request->has('ad_id')) {
            $room = ChatRooms::where('ad_id', $request->ad_id)->where('from_user_id',api()->user()->id)->first();
            $ad = Ad::find($request->ad_id);
            if (!$room) {
                $room = ChatRooms::create([
                    'ad_id' => $request->ad_id,
                    'from_user_id' => api()->user()->id,
                    'to_user_id' => $ad->user_id,
                ]);
            }

            return helperJson(new RoomResources($room));
        }else{
            $room = ChatRooms::find($request->room_id);
            return helperJson(new RoomResources($room));
        }
        return helperJson(ChatResources::collection($data));
    }//end fun

    public function sendMessage(Request $request)
    {
        $rules = [
            'ad_id' => ["required",Rule::exists('ads','id')],
            'room_id'=>['required',Rule::exists('chat_rooms','id')->where('ad_id',$request->ad_id)],
            'message'=>'required_if:type,==,text',
            'file'=>'required_if:type,==,file|mimes:jpeg,jpg,png,svg,webp,gif,pdf,doc,docx,xls,xlsx,ppt,pptx,txt,zip,rar',
            'type'=>'required|in:text,file',
        ];
        $validator = Validator::make($request->all(), $rules, [
            'ad_id.exists' => '411',
            'room_id.exists' => '412',
        ]);
        if ($validator->fails()) {
            $errors = collect($validator->errors())->flatten(1)[0];
            if (is_numeric($errors)) {
                $errors_arr = [
                    '411' => 'Failed,ad not found',
                    '412' => 'Failed,room not found',
                ];
                $code = collect($validator->errors())->flatten(1)[0];
                return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
            }
            return helperJson(null, $validator->errors(), 422);
        }
        $data = $request->except('country');
        $data['user_id'] = api()->user()->id;

        if ($request->type == 'file' && $request->hasFile('file')){
            $data['file'] = $this->uploadFiles('chat',$request->file);
        }
        $create = ChatMessage::create($data);
        $data = new ChatResources($create);
        $room = ChatRooms::find($request->room_id);
        $user_id = $room->from_user_id == api()->user()->id ? $room->to_user_id : $room->from_user_id;

        $this->sendChatNotification($data,$user_id);

        return helperJson($data);
    }//end fun

    public function myRooms()
    {
        $data = ChatRooms::where(function($userQuery){
            $userQuery->where('from_user_id', auth()->user()->id)->orWhere('to_user_id', auth()->user()->id);
        })->get();
        return helperJson(RoomResources::collection($data));
    }//end fun

}//end class
