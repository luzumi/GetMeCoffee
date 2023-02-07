<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class SendRequestToRasp extends Controller
{
    public function getUser()
    {

        //request to rasp
//        while(\Session::get('userID') == null){
//            //do nothing
//            $id++;
//        }


        $user = User::find(rand(0,3));

        sleep(1);

        header("Content-Type: text/event-stream");
        header("Cache-Control: no-cache");


            // Trigger event when necessary


        echo "data: " . json_encode(['user' => $user]) . "\n\n";

        ob_flush();
        flush();
    }
}
