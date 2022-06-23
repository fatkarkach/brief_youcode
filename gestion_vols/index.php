<?php
require_once './Autoloade.php';
$home=new Router();
$pages=['login', 'Logout', 'admin', 'dashboard','index1','recherche','reservation','passagers','reservationadmin'];
    if(isset($_SESSION['fatma'])&& $_SESSION["statut"]==="Admin" && $_SESSION['fatma']===true) 
    {
        if (isset($_GET['page'])) {
            if (in_array($_GET['page'], $pages)) {
                $page=$_GET['page'];
                $home->index($page);
            } else {
                $home->index('admin');
            }
        } else {
            $home->index('admin');
        }
    }
  else if(isset($_SESSION['fatma'])&& $_SESSION["statut"]==="User" && $_SESSION['fatma']===true) 
    {
        if (isset($_GET['page'])) {
            if (in_array($_GET['page'], $pages)) {
                $page=$_GET['page'];
                $home->index($page);
            } else {
                $home->index('dashboard');
            }
        } else {
            $home->index('dashboard');
        }
    }
    else if(isset($_GET['page']) && $_GET['page']=='index1'){
        $home->index('index1');
    }
    else{
        $home->index('login');
    }
?>