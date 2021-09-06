<?php

namespace App\Http\Controllers;

use function array_push;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QRCodeGenerator extends Controller
{
    //
    public function index(){


        return view('qrcode.index');
    }

    public function generate(Request $request){

        $request->validate([
            'endrange' => 'required_with:endrange|integer|min:1|max:100',

        ]);

        //$baseUrl = $request->input('mybaseurl')."order/table/";
        $baseUrl = "https://qr.horecalo.com/";
        $links= [];

        $startRange = $request->input('startrange');
        $endRange = $startRange+ $request->input('endrange');
        for($i= $startRange; $i< $endRange; $i++) {
                $link = $baseUrl.Str::uuid();
                array_push($links,$link);
               }

               return view('qrcode.generate',compact('links'));
    }
}
