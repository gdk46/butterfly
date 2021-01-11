<?php

require "../env.php";

$fd = new Folder\Folder('C:/xampp/htdocs/php/');

echo "<pre>";
print_r(
    $fd->createFolder([
        'test/',
        'test/app/',
        'test/app/Api/',
        'test/app/Controller/',
        'test/app/Dao/',
        'test/app/Model/',
        'test/app/Util/',
        'test/app/Vendor/',
        'test/environment/',
        'test/environment/Test/',
        'test/environment/conf/'
    ])
);
