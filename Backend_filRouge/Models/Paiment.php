<?php
class Paiment{
    static public function Add($R_V){
        try {
             $query="INSERT INTO paiment (Prix,mois,id_boutique)VALUES(:Prix,:mois,:id_boutique)";
             $stmt = DB::connect()->prepare($query);
             $stmt->bindParam(':Prix',$R_V['Prix']);
             $stmt->bindParam(':mois',$R_V['mois']);
             $stmt->bindParam(':id_boutique',$R_V['id_boutique']);
             if ($stmt->execute()) {
                     return 1;
                 } else {
                     return 0;
                 }
        } catch (PDOException $ex) {
            echo 'erreur'.$ex->getMessage();
        }
    }
    static public function getAll_py($id){
        $query="SELECT * from boutiques 
        INNER JOIN partenaire ON partenaire.id= boutiques.id_partenaire 
        WHERE id_partenaire='$id'";
        $stmt = DB::connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    static public function edit_py($id){
        try {
            $type_paiment=1;
            $stmt = DB::connect()->prepare("UPDATE paiment SET type_paiment=:type_paiment where id_paiment=:id");
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':type_paiment',$type_paiment);
            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;
            }
        } catch (PDOException $ex) {
            echo 'erreur'.$ex->getMessage();
        }
    }
    static public function getAll_prix() {
        $query ="SELECT * FROM paiment 
        INNER JOIN boutiques ON boutiques.id_boutique = paiment.id_boutique
         INNER JOIN partenaire ON partenaire.id = boutiques.id_partenaire";
        $stmt = DB::connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();         
    }
 
}
?>