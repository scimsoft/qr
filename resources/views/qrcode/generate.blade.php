@extends('layouts.app')
<script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.3.3/lib/qr-code-styling.js"></script>

@section('content')
<div id="canvas"></div>
@foreach($links as $link)
    <h2>La Tertulia</h2>
    <h3>Para pedir desde la mesa:</h3>
    <h3>&nbsp;</h3>
    <h3>1. Escanea el QR</h3>
    <h3>2. Añadir productos</h3>
    <h3>3. Pulsa la cesta</h3>
    <h3>4. Pulsa el boton pedir</h3>
    <h3>Gracias</h3>
    <h3>&nbsp;</h3>
    <script type="text/javascript">


        var qrCode = new QRCodeStyling({
            width: 250,
            height: 250,
            data: "{{$link}}",
            margin: 50,
            image: "",
            dotsOptions: {
                color: "#00186e",
                type: "classy-rounded"
            },
            backgroundOptions: {
                color: "#ffffff",
            },
            imageOptions: {
                crossOrigin: "anonymous",
                margin: 20
            },
            cornersSquareOptions:{
                type:"extra-rounded",
                color:"#000000"},
           cornersDotOptions:{
                type:"",
               color:"#000000"},
        });

        qrCode.append(document.getElementById("canvas"));



    </script>
@endforeach

@endsection



