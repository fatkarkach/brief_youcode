<?php
header('Access-control-Allow-Origin: *');
header('Content-Type: application/json');
require_once './Autoloade.php';

$query= "SELECT * FROM partenaire WHERE email=? and password=?";
$stmt = DB::connect()->prepare($query);
$result=array();

$result['error']=false;
    if ($_SESSION['is_db_connected']){
        $result["is_db_connected"]=true;
        $result["connction_msg"]="Connected successfully";
        $result["connction_aa"]="Connected successfully";
    }else{
        $result["is_db_connected"]=false;
        $result["connction_msg"]="Connected failed";
    }
$pages=[ 'Login-u','Logout-u','Read-rv','Update-rv','Delete-rv','Partenaire-rv','Produit-rv','Update-cmd','Add-py','Read-py','Read-bn'];
    if(isset($_GET['page']) !== null ){
        if (isset($_GET['page'])) {
            if (in_array($_GET['page'], $pages)) {
                $page=$_GET['page'];
               if ($page=="Read-rv"){
                    $result_rv=array();
                    $data = new Rv_controllers();
                    $result_rv=$data->getAll_Rv();
                    $result['r_v']=$result_rv;
                }else if ($page=="Read-bn"){
                    $result_rv=array();
                    $data = new Boutique_controller();
                    $result_rv=$data->getAll_Boutiques_bn();
                    $result['r_v']=$result_rv;
                }else if ($page=="Produit-rv"){
                    $result_pv=array();
                    $data = new Achat_stock();
                    $result_pv=$data->getAll_Produits();
                    $result['pv']=$result_pv;
                }
                else if ($page=="Read-py"){
                    $result_pv=array();
                    $data = new paiment_rv();
                    $result_pv=$data->getAll_py();
                    $result['pv']=$result_pv;
                }
                 else if ($page=="Partenaire-rv"){
                    $result_rp=array();
                    $data = new Boutique_controller();
                    $result_rp=$data->getAll_Boutiques();
                    $result['r_p']=$result_rp;
                }
                else if ($page=="Update-cmd"){
                    $update_rv=new Achat_stock();
                    $result_rv=$update_rv->update_cmd();
                    if($result_rv){
                        $result['message']="successfully updating this r_v";
                    }else{
                        $result['error']=true;
                        $result['message']="Failed updating this r_v";
                    }
                }  else if ($page=="Update-rv"){
                    $update_rv=new Rv_controllers();
                    $result_rv=$update_rv->update_rv();
                    if($result_rv){
                        $result['message']="successfully updating this r_v";
                    }else{
                        $result['error']=true;
                        $result['message']="Failed updating this r_v";
                    }
                }
                else if ($page=="Delete-rv"){
                    $delete_rv=new Rv_controllers();
                    $result_rv=$delete_rv->delete_rv();
                    if($result_rv){
                        $result['message']="successfully Deleting this r_v";
                    }else{
                        $result['error']=true;
                        $result['message']="Failed Deleting this r_v";
                    }
                    }else if ($page=="Add-py"){
                        $delete_rv=new paiment_rv();
                        $result_rv=$delete_rv->Add_rv();
                        if($result_rv){
                            $result['message']="successfully Add this r_v";
                        }else{
                            $result['error']=true;
                            $result['message']="Failed Add this r_v";
                        }
                    }
                    else if ($page=="Login-u"){
                    $connecter=new login_controller();
                    $connecter_user=$connecter->Connecter();
                    if(isset($connecter_user['type'])){
                        $result['user_connecter']=True;
                        $result['email']=$connecter_user['email'];
                        $result['password']=$connecter_user['password'];
                        $result['type_user']=$connecter_user['type'];
                        $result['id_user']=$connecter_user['id'];
                    }else{
                        $result['user_connecter']=False;
                        $result['message_user']="Veuillez entrer les informations correctes afin d'entrer avec succès";
                    }                   
                }
               
            }
        }
    }
    
echo json_encode($result);