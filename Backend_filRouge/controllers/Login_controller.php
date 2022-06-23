<?php

class login_controller{
    public function Connecter(){
        if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = new User();
            return $user->user_connecter($email,$password);
        }
    }
    }

?>