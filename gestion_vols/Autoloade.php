<?php 
session_start();
// PHP mettra dans une pile/file d'attente et appellera séquentiellement lorsqu'une "nouvelle classe" est déclarée.
spl_autoload_register(function ($class_name){
    $array_paths=array(
        'controller/',
        'model/',
    );
//retourne un tableau de chaînes de caractères
    $parts= explode("\\", $class_name);
//Supprimez le dernier élément d'un tableau :
    $name=array_pop($parts);
    foreach($array_paths as $path){
        //Remplacez le signe pourcentage (%) par une variable passée en argument
        $file=sprintf($path.'%s.php',$name);
        //Vérifiez si le nom de fichier spécifié est un fichier normal 
        if (is_file($file)) {
            include_once $file;
        }
    }
});