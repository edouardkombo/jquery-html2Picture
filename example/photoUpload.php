<?php

$media      = filter_input(INPUT_POST, 'image');
$newMedia   = base64_decode(str_replace('data:image/png;base64,','', $media));
$mediaName  = filter_input(INPUT_POST, 'name');
$filename   = 'medias/' . $mediaName;

//Create content
echo (file_put_contents($filename, $newMedia)) ? true : false;