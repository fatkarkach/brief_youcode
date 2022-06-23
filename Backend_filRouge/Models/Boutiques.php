<?php
class Boutiques{
    static public function partenaire_boutique() {
        $query = "SELECT * , COUNT(*) as nbre_boutique FROM boutiques
         INNER JOIN partenaire ON partenaire.id = boutiques.id_partenaire 
         GROUP BY boutiques.nom_boutique";
        $stmt = DB::connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();        
    }
    static public function boutique_bn() {
        $query = "SELECT *FROM paiment
         INNER JOIN boutiques ON boutiques.id_boutique =paiment.id_boutique";
        $stmt = DB::connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();        
    }

}
?>