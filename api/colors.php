<?php
use Firebase\JWT\JWT;
require "../api/vendor/autoload.php";
require_once "../api/core/conexion.php";
class colores extends DataBase{
  private $link = null;

  public function __construct(){
    $this->link = DataBase::getInstance();
  }

  public function crudcolors(){
      $metodo= $_SERVER['REQUEST_METHOD'];
      switch ($metodo) {
        case 'GET':
            $registros= 6;
            $contador= 1;
            $pagina=false;

            if (isset($_GET["pagina"])) {
                $pagina = $_GET["pagina"];
            }

            if (!$pagina) {
                $inicio = 0;
                $pagina = 1;
            } else {
                $inicio = ($pagina - 1) * $registros;
            }
            $total_reg=$this->link->getOnlyRow("select count(*) as total from colores");
            $result= $this->link->getAllRow("select * from colores limit ".$inicio.",".$registros);
            $total_paginas = ceil($total_reg['total'] / $registros);
            $data= array('resultados'=>$result,'total_reg'=>$total_reg['total'],'total_pag'=>$total_paginas,'pag'=>$pagina);
            if($total_reg > 0){
              http_response_code(200);
              return json_encode($data);
            }else{
              http_response_code(404);
              return json_encode(
                array("message" => "No se encontro ningun color")
              );
            }
          break;
        case 'POST':
          $jwt= $_COOKIE["cookie_jwt"];
          $key="QmkwbG94aUAxNSEuNWtsMzVPLg==";
          $decoded= JWT::decode($jwt,$key,array('HS256'));
          $admin=$decoded->admin;
          if($admin==1){
            $message=array();
            $reg = json_decode(file_get_contents("php://input"));
            $nombreC= $reg->name;
            $codHex= $reg->hexadecimal;
            $codPant= $reg->pantone;
            $year= $reg->year;
            $insert=$this->link->exec("INSERT INTO colores(name,color,pantone,year) values ('".$nombreC."','".$codHex."','".$codPant."',".$year.")");
            if($insert!=false){
              $message['status']=200;
              $message['mensaje']="Color agregado exitosamente";
            }else{
              $message['status']=201;
              $message['mensaje']="Ha ocurrido un error al tratar de agregar el color";
            }
          }else{
            $message['status']=401;
            $message['mensaje']="Acción no Autorizada";
          }

          echo json_encode($message);
          break;
        case 'PUT':
        $jwt= $_COOKIE["cookie_jwt"];
        $key="QmkwbG94aUAxNSEuNWtsMzVPLg==";
        $decoded= JWT::decode($jwt,$key,array('HS256'));
        $admin=$decoded->admin;
        if($admin==1){
          $message=array();
          $reg = json_decode(file_get_contents("php://input"));
          $nombreC= $reg->name;
          $codHex= $reg->hexadecimal;
          $codPant= $reg->pantone;
          $year= $reg->year;
          $id= $reg->idcolor;
          $update=$this->link->exec("UPDATE colores set name='".$nombreC."',color='".$codHex."',pantone='".$codPant."',year=".$year." WHERE idcolor=".$id);
          if($update!=false){
            $message['status']=200;
            $message['mensaje']="Color editado exitosamente";
          }else{
            $message['status']=201;
            $message['mensaje']="Ha ocurrido un error al tratar de editar el color";
          }
        }else{
          $message['status']=401;
          $message['mensaje']="Acción no Autorizada";
        }
        echo json_encode($message);
          break;
        case 'DELETE':
        $jwt= $_COOKIE["cookie_jwt"];
        $key="QmkwbG94aUAxNSEuNWtsMzVPLg==";
        $decoded= JWT::decode($jwt,$key,array('HS256'));
        $admin=$decoded->admin;
        if($admin==1){
          $message=array();
          $reg = json_decode(file_get_contents("php://input"));
          $id= $reg->idcolor;
          $delete=$this->link->exec("DELETE FROM colores where idcolor=".$id);
          if($delete!=false){
            $message['status']=200;
            $message['mensaje']="Color eliminado exitosamente";
          }else{
            $message['status']=201;
            $message['mensaje']="Ha ocurrido un error al tratar de eliminar el color";
          }
        }else{
          $message['status']=401;
          $message['mensaje']="Acción no Autorizada";
        }
        echo json_encode($message);
          break;

      }
  }

  public function __destruct(){
    $this->link = null;
  }
}
$obj = new colores();
$obj->crudcolors();
 ?>
