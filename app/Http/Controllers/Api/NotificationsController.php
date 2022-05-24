<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;

class NotificationsController extends Controller
{
    public function getUserNotification($id){
        $blog = Notification::where('user_id',$id)->orWhere('user_id',null)->count();

        if($blog > 0){
            $blog = Notification::where('user_id',$id)->orWhere('user_id',null)->orderBy('id','desc')->get('message')->toArray();       
        }else{
            $blog = [];
        }
        return [
            'data' => ($blog),
            'success' => true,
            'status' => 200
        ];
    }
}
