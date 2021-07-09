<?php
require_once "../api/core/conexion.php";
class readcolors extends DataBase{
  private $link = null;

  public function __construct(){
    $this->link = DataBase::getInstance();
  }

  public function getcolor(){
    $message=array();
    $reg = json_decode(file_get_contents("php://input"));
    $id= $reg->idcolor;
    $data=$this->link->getAllRow("Select * from colores where idcolor=".$id);
    if($data!=false){
      $message['status']=200;
      $message['data']=$data;
    }else{
      $message['status']=201;
      $message['data']="No hay informacion de este color";
    }
    echo json_encode($message);
  }

  public function __destruct(){
    $this->link = null;
  }
}
$obj = new readcolors();
$obj->getcolor();
 ?>
