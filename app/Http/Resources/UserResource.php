<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Models\Session;
use App\Http\Resources\SessionResource;


class UserResource extends Resource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'online'=>false,
            'session'=>$this->session_details($this->id)
                
            


        ];
    }
    private function session_details($id){
         $session=Session::whereIn('user1_id',[auth()->id(),$id])->whereIn('user2_id',[auth()->id(),$id])->first();
         return new SessionResource($session);
    }
}
