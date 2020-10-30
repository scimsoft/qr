<?php

namespace App\Http\Controllers;

use App\Models\QRRedirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class RedirectController extends Controller
{
    //
    public function redirect($index){
        Log::debug('index '.$index);
        $qrredirect = QRRedirect::where('soureURL','=',$index)->first();
        Log::debug('Destiny '.$qrredirect->id);
        return Redirect::to($qrredirect->destinyURL);
    }
}
