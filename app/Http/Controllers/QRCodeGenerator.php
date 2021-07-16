<?php

namespace App\Http\Controllers;

use function array_push;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Http\Request;

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

        $baseUrl = $request->input('mybaseurl')."order/table/";

        $links= [];

        $startRange = $request->input('startrange');
        $endRange = $startRange+ $request->input('endrange');
        for($i= $startRange; $i< $endRange; $i++) {
                $link = $baseUrl.$i;
                array_push($links,$link);
               }

               return view('qrcode.generate',compact('links'));
    }
}
