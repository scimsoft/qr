<?php

namespace App\Http\Controllers;

use App\Models\QRRedirect;
use function compact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use function is_null;

class RedirectController extends Controller
{
    //
    public function redirect($index){
        Log::debug('index '.$index);
        $qrredirect = QRRedirect::where('soureURL','=',$index)->first();
        if(is_null($qrredirect)){
            if(auth()->user()){
                $qrredirect=new QRRedirect();
                $qrredirect->soureURL = $index;
                $qrredirect->destinyURL = "";
                $qrredirect->active = 1;
                $qrredirect->save();
                return view ('qrredirect.edittable',compact('qrredirect'));
            }else{
                return view ('qrredirect.notfound');
            }
        }else if( auth()->user() AND $qrredirect->user_id == auth()->user()->id){
            return $this->editTable($index);
        }

        Log::debug('Destiny '.$qrredirect->id);
        return Redirect::to($qrredirect->destinyURL);
    }

    private function editTable($index){
        $qrredirect = QRRedirect::where('soureURL','=',$index)->first();
        $baseUrlLength=strlen(auth()->user()->baseurl);
        return view ('qrredirect.edittable',compact('qrredirect'));
    }
}
