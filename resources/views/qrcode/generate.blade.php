@extends('layouts.print')
<script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.3.3/lib/qr-code-styling.js"></script>
<style>
    @media print {
        h2 {
            page-break-before: always;
        }

        h3, h4 {
            page-break-after: avoid;
        }

        div {
            page-break-inside: avoid;
        }
    }
</style>
@section('content')
    <div class="flex-container">


        @foreach($links as $link)
            <div class="flex-item border">
                <div id="canvas-{{$link}}" class="flex-item m-5 ">
                    <img src="/img/order.png">
                </div>


            </div>




            <script type="text/javascript">


                var qrCode = new QRCodeStyling({
                    width: 350,
                    height: 350,
                    data: "{{$link}}",
                    margin: 100,
                    image: "",
                    qrOptions: {
                        typeNumber: "8",
                        mode: "Byte",
                        errorCorrectionLevel: "H"
                    },
                    dotsOptions: {
                        color: "#000000",
                        type: "square"
                    },
                    backgroundOptions: {
                        color: "#ffffff",
                    },
                    imageOptions: {
                        crossOrigin: "anonymous",
                        margin: 20
                    },
                    cornersSquareOptions: {
                        type: "",
                        color: "#000000"
                    },
                    cornersDotOptions: {
                        type: "",
                        color: "#000000"
                    },
                });

                qrCode.append(document.getElementById("canvas-{{$link}}"));


            </script>

        @endforeach
    </div>
@endsection



