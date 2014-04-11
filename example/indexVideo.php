<!doctype html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="keywords" content=""/>
    <meta name="revisit-after" content="1 days" />
    <script src="js/jquery-2.1.0.min.js"></script>
    <script src="js/jquery.html2Picture.min.js"></script>
    <script>
        $(document).ready(function(){
            
            function activateCam() 
            {
                var onCameraFail = function (e) {
                    console.log('Camera did not work.', e);        
                };

                onCameraFail;

                /* HTML5 VIDEO ELEMENTS */
                var video = document.querySelector("#vid");
                var canvas = document.querySelector('#canvas');
                var ctx = canvas.getContext('2d');
                var localMediaStream = null;

                navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
                window.URL = window.URL || window.webkitURL;
                navigator.getUserMedia({video:true}, function (stream) {
                    video.src = window.URL.createObjectURL(stream);
                    localMediaStream = stream;
                }, onCameraFail);
            }

            activateCam();            
            
            $('body').click(function(){
                
                $('#vid').html2Picture({
                    type: 'video',
                    pictureName: $.now(),
                    pictureFormat: 'png',
                    showCanvas: false,
                    callback: function (data) {
                        $.post('photoUpload.php',{image: data.url, name: data.fullPictureName}, function(datas){
                            $('#testEnd').html('<img src="'+ data.url +'">');
                        });                     
                    }
                });                
                
            });
            
        });
    </script>
 </head>
<body style="width:100;height:1000px;">
     
    <video id='vid' autoplay></video>
    
    <div id='testEnd' style='position:absolute;top:0;left:30%;'></div>
    <canvas id='canvas'></canvas>
</body>
</html>