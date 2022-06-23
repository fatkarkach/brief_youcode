<?php
class user_back
{  
        //add
        public function reserver()
        {
        if(isset($_POST['submit_reserve'])){

            $choix = $_POST['choix'];
            $id_user = $_SESSION['id_user'];      
            $id_vols = $_POST['id_vols'];
            $places_disponibles=$_POST['places_disponibles'];
        }
            $vol = new Reservation();
            $vol -> reserve_insert($choix, $id_user , $id_vols,$places_disponibles);  
            header("location: reservation");
         }
        //supprimer

        public function reservation_supprimer(){
            if(ISSET($_POST['delete'])){   
                $id=$_POST['id'];
                $vol = new Reservation();
                $vol -> reservation_delete($id);
                }
            } 
        }
        //nombre de place rest en vol
        

        