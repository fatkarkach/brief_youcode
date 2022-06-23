<?php
header('Access-Control-Allow-Origin: * ');
$result=array('error'=>false);
$result['message']="";
//connexion a la base de donnees
$hostname="localhost";
$hostuser="root";
$hostpass="";
$hostdb="vujs_php";
$connect=mysqli_connect($hostname,$hostuser,$hostpass);
if(isset($connect) && isset($hostdb)){
    $connect_db=mysqli_select_db($connect, $hostdb);
    if($connect_db){
        $result["is_db_connected"]=true;
        $result["connection_msg"]="succeed connected";

    }else{

        $result["is_db_connected"]=false;
        $result["connection_msg"]="Err : failed connected";
    }

}else{
    $result["is_db_connected"]=false;
    $result["connection_msg"]="connexion setup is not correct";

}
//action
$action="";
if(isset($_GET['action']))
    {
        $action=$_GET['action'];

    }
if($action=="read")
{
//    $result["students"]="hi";
    $sql=mysqli_query($connect,"select * from `students`");
    $stdArr=array();
    while($rows=mysqli_fetch_assoc($sql))
    {
        array_push($stdArr,$rows);
        $sqlnumofrows=mysqli_num_rows($sql);
        if($sqlnumofrows <1)
        {
            $result["error"]=true;
            $result['message']="n'es pas des students";
        }

    }
    $result["students"]=$stdArr;

}
if($action=="create")
{

}
if($action=="update")
{

}
if($action=="delete")
{

}
if($action=="deleteall")
{
    $sql=mysqli_query($connect,"delete from `students`");
    if($sql){
        $result["message"]="success";
    }else
    {
        $result["error"]=true;
        $result["message"]="failed delete";
    }
}
echo  json_encode($result);
mysqli_close($connect);
?>