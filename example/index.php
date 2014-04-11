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
            $('body').click(function(){
                $('#turtles').html2Picture({
                    type: 'photo', //Allowed (video, photo)
                    pictureName: $.now(),
                    pictureFormat: 'png',
                    showCanvas: false,
                    quality: 1.0, //Range from 0.0 => 1.0
                    callback: function (data) {
                        // RETURNED VALUES 
                        //data.url              => Image resource
                        //date.name             => Name of the image
                        //data.extension        => Picture extension
                        //data.fullPictureName  => Name + extension
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
    
    <div id='test' style='position:absolute;top:0;'>
        <img src='img/turtles.jpg' id='turtles'>
    </div>
    <div id='testEnd' style='position:absolute;top:0;left:30%;'></div>
    <canvas id='canvas'></canvas>
</body>
</html>