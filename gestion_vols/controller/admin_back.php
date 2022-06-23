<?php
class admin_back{
public function users_ajouter(){
    //add
    if(isset($_POST['save'])){
        $lieu_départ = $_POST['lieu_départ'];
        $lieu_arrivé = $_POST['lieu_arrivé'];
        $date_départ = $_POST['date_départ'];
        $date_arrivé = $_POST['date_arrivé'];
        $prix = $_POST['prix'];
        $limites_places = $_POST['limites_places'];
        $vol = new Vol();
        $vol -> vol_insert($lieu_départ, $lieu_arrivé,$date_départ,$date_arrivé,$prix,$limites_places);  
    }
}
//update
public function users_modifier(){
if(ISSET($_POST['update'])){
  
    $id_vols = $_POST['id_vols'];
    $lieu_départ = $_POST['lieu_départ'];
    $lieu_arrivé = $_POST['lieu_arrivé'];
    $date_départ = $_POST['date_départ'];
    $date_arrivé = $_POST['date_arrivé'];
    $prix = $_POST['prix'];
    $limites_places = $_POST['limites_places'];
    $vol = new Vol();
    $vol -> vol_update($id_vols ,$lieu_départ,$lieu_arrivé,$date_départ,$date_arrivé,$prix,$limites_places);
} 
}
//delete
public function users_supprimer(){
if(ISSET($_POST['delete'])){
  
    $id_vols=$_POST['id_vols'];
    $vol = new Vol();
    $vol -> vol_delete($id_vols);
} 
}
}
?>