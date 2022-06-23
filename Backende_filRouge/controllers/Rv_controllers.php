<?php /** @noinspection ALL */

class Rv_controllers{
        public function getAll_Rv(){
            $rv= Partenaire::getAll_rv();
            return $rv;
        }
        public function update_rv(){
            if(isset($_POST['id']) && isset($_POST['option']) ){
                $R_V=array(

                    'id' => $_POST['id'],
                    'option' => $_POST['option'],
                );
                $resul_Edit=Partenaire::Edit($R_V);
                return $resul_Edit;
            }
        }
        public function delete_rv(){
            if(isset($_POST['id'])){
                $id = $_POST['id'];
                $resul_delete=Partenaire::Delete($id);
                return $resul_delete;
            }
        }
    }
    ?>
        