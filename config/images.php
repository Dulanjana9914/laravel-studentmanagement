<?php

return [

'driver' => env('IMAGE_DRIVER','gd'),
'upload_path' => env('IMAGE_UPLOAD_PATH','/uploads'),
'access_path' => env('IMG_PATH','http://student.test/uploads'),

1 => ['width' => 100, 'height' => 100],
2 => ['width' => 480, 'height' => 635],
3 => ['width' => 1920, 'height' => 700],
4 => ['width' => 960, 'height' => 960],
5 => ['width' => 105, 'height' => 140],

];

?>