<?php

namespace App\Helper;

use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

trait PusherNotificationHelper{
    
    /**
     * @param array $data
     * 
     */
    public function sendNotification(array $data) 
    {
        $user = Auth::user();
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            array('cluster' => env('PUSHER_APP_CLUSTER'))
        );
        $pusher->trigger(
            'notifikasi-keterlambatan.'.$user->id,
            'my-event',
            $data
        );
    }
}
