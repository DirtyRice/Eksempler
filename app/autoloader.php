<?php

class Autoloader {
    static public function loader($className) {
        $filename = "./app/" . str_replace('\\', '/', $className) . ".php";
        if (file_exists($filename)) {
            include($filename);

            if (class_exists($className) OR interface_exists($className)) {
                return TRUE;
            }
        }
        return FALSE;
    }
}
spl_autoload_register('Autoloader::loader');