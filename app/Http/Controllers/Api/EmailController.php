<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendMailRequest;
use App\Jobs\SendEmail;
use App\Mail\RandEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function __invoke()    //SendMailRequest $request не нужно така как не имеет смысла
    {

        for ($i=0;$i<10;$i++){
            SendEmail::dispatch('office@technolux.by','Hallo Kristina!',' ');
        }

    }
}
