<?php 

class  Partenaire
{

    static public function getAll_rv(){
        $query="SELECT *FROM partners";
        $stmt = DB::connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    static public function Edit($R_V){
        try {
            $stmt = DB::connect()->prepare("UPDATE partners SET option=:option where Partner_id=:Partner_id");
            $stmt->bindParam(':Partner_id',$R_V['Partner_id']);
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
        $query="SELECT *FROM partners  where Partner_id=:Partner_id";
        $stmt = DB::connect()->prepare($query);
        $stmt->bindParam(':Partner_id', $id);
        if ($stmt->execute()) {
            $query="DELETE FROM partners  where Partner_id=:Partner_id";
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