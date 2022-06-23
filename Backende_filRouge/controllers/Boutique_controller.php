<?php
class Boutique_controller{
    public function getAll_Boutiques(){
        $rp=Boutiques::partenaire_boutique();
        return $rp;
    }
    public function getAll_Boutiques_bn(){
        $rp=Boutiques::boutique_bn();
        return $rp;
    }
}
?>