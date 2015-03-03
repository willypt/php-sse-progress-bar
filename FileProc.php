<?php
class FileProc {
    //protected $file;
    public static function exists($filename){
        return (file_exists($filename));
    }
    public static function put($filename, $content){
        $file = fopen($filename, 'w');
        fwrite($file, $content);
        fclose($file);
    }
    public static function get($filename){
        if(self::exists($filename)){
            $file = fopen($filename, 'r');
            $content = fread($file, filesize($filename));
            fclose($file);
            return $content;    
        } else {
            return false;
        }
    }
    public static function delete($filename){
        if(self::exists($filename)){
            unlink($filename);
        }
    }
}