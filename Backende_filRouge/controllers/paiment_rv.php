<?php
class paiment_rv{
    public function Add_rv(){
        if(isset($_POST['mois'])&&isset($_POST['Prix']) && isset($_POST['id'])){
            $R_V=array(
                'Prix' => $_POST['Prix'],
                'mois' =>$_POST['mois'],
                'id_boutique'=>$_POST['id']
            );
            $resul_Add=Paiment::Add($R_V);
            return $resul_Add;
        }
    }
    public function getAll_py(){
        if(isset($_POST['id_user'])){
            $id=$_POST['id_user'];
            $rp=Paiment::getAll_py($id);
            return $rp;
        }
        
    }
    public function getAll_pr(){
            $rp=Paiment:: getAll_prix();
            return $rp;
    }
}
