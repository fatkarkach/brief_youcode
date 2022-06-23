<?php
class Achat_stock{
    public function getAll_Produits(){
        $pv=Achats::Produit_R();
        return $pv;
    }
    public function update_cmd(){
        if(isset($_POST['id_commandes']) && isset($_POST['option']) ){
            $R_V=array(

                'id_commandes' => $_POST['id_commandes'],
                'option' => $_POST['option'],
            );
            $resul_Edit=Achats::Edit_cmd($R_V);
            return $resul_Edit;
        }
    }
}
?>