<?php
        
spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
    $path = "classes/";
    $extension = ".classes.php";
    $fullPath = $path . $className . $extension;

    if(!file_exists($fullPath)){

        echo "We could not found this class". $fullPath;
        return false;
  
    }

    include_once ($fullPath);

}