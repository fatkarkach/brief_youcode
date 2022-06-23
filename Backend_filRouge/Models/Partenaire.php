<?php 

class  Partenaire
{

    static public function getAll_rv(){
        $query="SELECT *FROM partenaire";
        $stmt = DB::connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    static public function Edit($R_V){
        try {
            $stmt = DB::connect()->prepare("UPDATE partenaire SET option=:option where id=:id");
            $stmt->bindParam(':id',$R_V['id']);
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
    static public function Delete($id){
        $query="SELECT *FROM partenaire  where id=:id";
        $stmt = DB::connect()->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            $query="DELETE FROM partenaire  where id=:id";
            $stmt = DB::connect()->prepare($query);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
}
?>