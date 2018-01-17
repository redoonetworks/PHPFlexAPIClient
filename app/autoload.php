<?php

class Autoload {
    protected static $_Registered = array();
    protected static $_NamespaceAliase = array();

    public static function load($classname) {
        if(!empty(self::$_NamespaceAliase)) {
            $classname = str_replace(array_keys(self::$_NamespaceAliase), array_values(self::$_NamespaceAliase), $classname);
        }

        if(strpos($classname, "_")) {
            $prefix = explode("_", $classname);
        } else {
            $prefix = explode("\\", $classname);
        }

        if(!isset(self::$_Registered[$prefix[0]])) {
            return false;
        }

        if($prefix[1] == "SWExtension") {
            if(count($prefix) == 3 && $prefix[2] == 'c'.sha1($prefix[0]."-GenKey")) {
                $origClass = $classname;
                $doAlias = true;

                $classname = str_replace("\\".$prefix[2], "\\GenKey", $classname);
            } else {
                $doAlias = false;
            }
        }

        $path = self::$_Registered[$prefix[0]]."/";
        $classNamePath = str_replace(array("_", "\\"), "/", $classname);

        if(file_exists($path.$classNamePath.".php")) {
            require_once($path.$classNamePath.".php");
        }
    }

    public static function registerDirectory($directory) {
        if(substr($directory, 0, 1) == "~") {
            global $root_directory;
            $directory = $root_directory."/".substr($directory, 2);
        }

        $directory = realpath($directory);
        if(is_dir($directory)) {
            $alle = glob($directory.'/*');
            foreach($alle as $datei) {
                if(is_dir($datei)) {
                    self::register(basename($datei), $directory);
                }
            }

        }

    }

    public static function register($prefix, $directory) {
        if(substr($directory, 0, 1) == "~") {
            global $root_directory;
            $directory = $root_directory."/".substr($directory, 2);
        }

        if(file_exists($directory)) {
            self::$_Registered[$prefix] = $directory;
        }
    }

    public function registerNamespaceAlias($Alias, $ExistingNamespace) {
        self::$_NamespaceAliase[$Alias] = $ExistingNamespace;
    }
}

spl_autoload_register(__NAMESPACE__ .'\Autoload::load');

\Autoload::registerDirectory(dirname(__FILE__)."/../lib/");
