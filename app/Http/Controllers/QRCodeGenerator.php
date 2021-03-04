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



// quick and simple:

        return view('qrcode.index');
    }

    public function generate(Request $request){
        $baseUrl = $request->input('mybaseurl');
        $links= [];
        /*$options = new QROptions([
            'version'      => 5,
            'outputType'   => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel'     => QRCode::ECC_L, //ECC_L, ECC_M, ECC_Q, ECC_H  容错率 ECC-Level: 7%, 15%, 25%, 30% ，即二维码损坏 % 多少时仍然可以识别，损坏越多识别越慢
            'scale'        => 6,
            'imageBase64'  => true,//是否返回 base64
            'moduleValues' => [
                // finder
                1536 => [0, 63, 255], // 三个角上 大码眼 rgb颜色
                6    => [255, 255, 255], // 底色
                // alignment
                2560 => [255, 0, 255],//右下角 小码眼 rgb颜色
                10   => [255, 255, 255], // 底色
                // timing
                3072 => [255, 0, 0],//辅助腰线  rgb颜色
                12   => [255, 255, 255],// 底色
                // format
                3584 => [67, 191, 84],//在码眼边缘 格式数据
                14   => [255, 255, 255],
                // version
                4096 => [62, 174, 190],//二维码版本
                16   => [255, 255, 255],
                // data
                1024 => [0, 0, 0],//主要数据
                4    => [255, 255, 255],
                // darkmodule
                512  => [0, 0, 0],
                // separator
                8    => [255, 255, 255],
                // quietzone
                18   => [255, 255, 255],
            ],
        ]);

// invoke a fresh QRCode instance
        $qrcode = new QRCode($options);

        for($i=$request->input('startrange');$i<$request->input('endrange');$i++){
            $data = $baseUrl . $i;
            $code=$qrcode->render($data);
            array_push($links,$code);
        }*/
        for($i=$request->input('startrange');$i<$request->input('endrange');$i++) {
                $link = $baseUrl.$i;
                array_push($links,$link);
               }

               return view('qrcode.generate',compact('links'));
    }
}
