<?php

class Autoloader
{
    /**
     * File extension as a string. Defaults to ".php".
     */
    protected static $fileExt = '.php';
    /**
     * The topmost directory where recursion should begin. Defaults to the current
     * directory.
     */
    protected static $pathTop = __DIR__;
    /**
     * A placeholder to hold the file iterator so that directory traversal is only
     * performed once.
     */
    protected static $fileIterator = null;
    /**
     * Autoload function for registration with spl_autoload_register
     *
     * Looks recursively through project directory and loads class files based on
     * filename match.
     *
     * @param string $className
     */
    public static function loader($className)
    {
		//echo "$className passed to autoloader <br>";
        $directory = new RecursiveDirectoryIterator(static::$pathTop, RecursiveDirectoryIterator::SKIP_DOTS);
        if (is_null(static::$fileIterator)) {
            static::$fileIterator = new RecursiveIteratorIterator($directory, RecursiveIteratorIterator::LEAVES_ONLY);
        }
        $filename = $className . static::$fileExt;
        foreach (static::$fileIterator as $file) {
            debug_backtrace ();
			//echo "Looking for $file <br>";
			if (strtolower($file->getFilename()) === strtolower($filename)) {
				//echo "Found $file == $filename <br>";
				if ($file->isReadable()) {
					//echo "Including {$file->getPathname()}";
                    include_once $file->getPathname();
                }
                break;
            }
        }
    }
    /**
     * Sets the $fileExt property
     *
     * @param string $fileExt The file extension used for class files.  Default is "php".
     */
    public static function setFileExt($fileExt)
    {
        static::$fileExt = $fileExt;
    }
    /**
     * Sets the $path property
     *
     * @param string $path The path representing the top level where recursion should
     *                     begin. Defaults to the current directory.
     */
    public static function setPath($path)
    {
        static::$pathTop = $path;
    }
}
Autoloader::setFileExt('.php');
spl_autoload_register('Autoloader::loader');
?>