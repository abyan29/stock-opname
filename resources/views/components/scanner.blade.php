<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QR Scanner</title>

    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>

    <style>
        body{
            margin:0;
            font-family:Arial;
            text-align:center;
            background:#f5f5f5;
        }

        h2{
            margin-top:20px;
        }

        #reader{
            width:400px;
            margin:30px auto;
        }
    </style>

</head>
<body>

<h2>Scan QR Barang</h2>

<div id="reader"></div>

<script>

const html5QrCode = new Html5Qrcode("reader");

Html5Qrcode.getCameras()
.then(cameras => {

    if(cameras.length == 0){
        alert("Camera tidak ditemukan");
        return;
    }

    html5QrCode.start(

        cameras[0].id,

        {
            fps:10,
            qrbox:250
        },

        function(decodedText){

            alert(decodedText);

            html5QrCode.stop();

        },

        function(error){}

    );

})
.catch(err => {

    console.log(err);

});

</script>

</body>
</html>