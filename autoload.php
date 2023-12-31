<?php

spl_autoload_register(function (string $class): void {

    $class = str_replace("FourYouSee", "src", $class);
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";

    if (file_exists($class)) {
        require_once $class;
    }
});
