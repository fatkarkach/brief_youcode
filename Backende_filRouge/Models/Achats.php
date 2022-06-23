<?php
class Achats{
    static public function Produit_R() {
        $query = "SELECT  * , COUNT(*) as achats from commande 
        INNER JOIN produit ON produit.id_produit  = commande.id_produit  
        INNER JOIN users ON users.id_users = commande.id_produit 
        GROUP BY commande.id_produit;";
        $stmt = DB::connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();         
    }
    //editer l'ption de commande
    static public function Edit_cmd($R_V){
        try {
            $stmt = DB::connect()->prepare("UPDATE commande SET option=:option where  id_commandes =:id_commandes");
            $stmt->bindParam(':id_commandes',$R_V['id_commandes']);
            $stmt->bindParam(':option',$R_V['option']);
            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;
            }
        } catch (PDOException $ex) {
            echo 'erreur'.$ex->getMessage();
        }
    }
}
?>