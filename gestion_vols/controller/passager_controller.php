<?php
        class passager_controller
        {
            public function passagers_ajouter()
            {
                if(isset($_POST['add_passager'])){
                $nom = $_POST['nom'];
                $prénom = $_POST['prénom'];
                $date_naissance = $_POST['date_naissance'];
                $id = $_POST['id'];
                $Passagers = new Passagers();
                $passager = $Passagers->passager_insert($nom, $prénom, $date_naissance, $id);
                }
            }
            public function   passager_modifier(){
                  
                    $id_passager = $_POST['id_passager'];
                    $nom = $_POST['nom'];
                    $prénom= $_POST['prénom'];
                    $date_naissance = $_POST['date_naissance'];
                    $passager = new Passagers();
                    $passager -> passagers_update($id_passager,$nom,$prénom,$date_naissance);
            }
            public function passager_supprimer(){  
                    $id_passager=$_POST['id_passager'];
                    $passager = new Passagers();
                    $passager -> passager_delete($id_passager);
                } 
            }
        
        
?>