<?php

namespace App\Http\Controllers\FCM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FCMController extends Controller
{

    public function notifyFB($users, $detail, $data)
    {
        foreach($users as $user) {
            $optionBuilder = new OptionsBuilder();
            $optionBuilder->setTimeToLive(60*20);
            
            $notificationBuilder = new PayloadNotificationBuilder($detail['title']);
            $notificationBuilder->setBody($detail['body'])
                                ->setSound('default');
            
            $dataBuilder = new PayloadDataBuilder();
            $dataBuilder->addData($data);
            
            $option       = $optionBuilder->build();
            $notification = $notificationBuilder->build();
            $data         = $dataBuilder->build();
            
            $token = $user->fcm_token;
            
            if ($token) {
                $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
            }
            
            //$downstreamResponse->numberSuccess();
            //$downstreamResponse->numberFailure();
            //$downstreamResponse->numberModification();
            
            ////return Array - you must remove all this tokens in your database
            //$downstreamResponse->tokensToDelete();
            //
            ////return Array (key : oldToken, value : new token - you must change the token in your database )
            //$downstreamResponse->tokensToModify();
            //
            ////return Array - you should try to resend the message to the tokens in the array
            //$downstreamResponse->tokensToRetry();
        }
    }
    //
}
