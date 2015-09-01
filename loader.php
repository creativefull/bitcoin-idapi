<?php

spl_autoload_register(function ($class) {
    $paths = explode("\\", $class);

    if (($paths[0] != "Teguholica") || ($paths[1] != "BitcoinIDAPI")) {
        return;
    }

    $fileName = __DIR__ . '/lib/Teguholica/BitcoinIDAPI/' .$paths[2] . '.php';

    if (file_exists($fileName)) {
        require_once $fileName;
    }
});
