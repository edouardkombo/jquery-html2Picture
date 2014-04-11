jQuery html2Picture
===================

jQuery html2Picture helps you take snapshot of img and video sources in your html document.
It capture source of your media and draw it in a canvas.
To save snapshots on your server, you can use html2Picture callback function.

Full example is available in this plugin.

1) Examples - How to get it work?
---------------------------------

Base using for picture snapshot

    $('#pictureId').html2Picture({
        type: 'photo', //Allowed (video, photo)
        pictureName: $.now(),
        pictureFormat: 'png',
        showCanvas: false,
        width: 300,
        height: 300,
        quality: 1.0, //Range from 0.0 => 1.0
        callback: function (data) {
            // RETURNED VALUES 
            //data.url              => Image resource
            //date.name             => Name of the image
            //data.extension        => Picture extension
            //data.fullPictureName  => Name + extension

            //Save your snapshot
            $.post('photoUpload.php',{image: data.url, name: data.fullPictureName}, function(datas){
                $('#testDiv').html('<img src="'+ data.url +'">');
            });                     
        }
    });


Base using for video snapshot

    $('#videoId').html2Picture({
        type: 'video', //Allowed (video, photo)
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

            //Save your snapshot
            $.post('photoUpload.php',{image: data.url, name: data.fullPictureName}, function(datas){
                $('#testDiv').html('<img src="'+ data.url +'">');
            });                     
        }
    });


2) TODO
--------

Next release will allow to capture html content.




jQuery html2Picture has been tested under and will work for further Jquery 2.1.0.

For contacts:
edouard.kombo@gmail.com
@edouardkombo on Twitter.

Enjoy!