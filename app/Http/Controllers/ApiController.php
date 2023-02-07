<?php

namespace App\Http\Controllers;

use App\Events\LoginEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    public function receiveData(Request $request)
    {
        $username = $request->input('data');
        $user = User::where('username', $username)
            ->first();
        Log::info('Rfid-Login from Raspberry Pi: ', [$request->method(), $request->path(), $request->header()]);

//        event(new LoginEvent($user));
        return response('',200);
    }
}
