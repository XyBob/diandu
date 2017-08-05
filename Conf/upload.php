<?php

return array(

    'DEFAULT_IMAGE_UPLOAD_DRIVER' => 'qiniu',
    'DEFAULT_IMAGE_UPLOAD_DIR' => 'default',

    'LOCAL_UPLOAD_DRIVER_CONFIG' => array(
        'IMAGE_DOMAIN' => 'http://' . $_SERVER['HTTP_HOST'] . '/',
    ),

    'QINIU_UPLOAD_DRIVER_CONFIG' => array(
        // 七牛 AccessKey
        'QINIU_ACCESS_KEY'      => 'ZPL50_kJXWddsTiVpFhN7rq3oAO9kohZFYBuCMbq',
        // 七牛 SecretKey
        'QINIU_SECRET_KEY'      => 'pHuiKxBuVrFMmMoZ5bD45W6kMsP6AHFTLw4zirMm',

        // 七牛图片空间 bucket
        'QINIU_IMAGES_BUCKET'   => 'pannationalarts-images',
        // 七牛图片空间对应的自定义域名
        'QINIU_IMAGES_DOMAIN'   => 'http://img.pannationalarts.com/',
    ),
);
