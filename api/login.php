<?php
use Firebase\JWT\JWT;
require "../api/vendor/autoload.php";
require_once "../api/core/conexion.php";
class login extends DataBase{
  private $link = null;

  public function __construct(){
    $this->link = DataBase::getInstance();
  }

  public function logueo (){
    $message=array();
    $reg = json_decode(file_get_contents("php://input"));
    $user= $reg->username;
    $pass= $reg->password;
    $check= $this->link->getOnlyRow("Select iduser,profile from users where user='".$user."' and password='".$pass."'");
    if($check!=false){
      $time= time();
      $key="QmkwbG94aUAxNSEuNWtsMzVPLg==";
      $token= array(
        'iat'=> $time,
        'exp'=> $time + (60*60),
        'userid'=> $check['iduser'],
        'admin'=> $check['profile']
      );
      $jwt = JWT::encode($token, $key);
      $nombre = 'cookie_jwt';
      $valor = $jwt;
      $expiracion = time() + (60 * 60);
      setcookie($nombre, $valor, $expiracion, "/", false, false, true);
      $message['status']=200;
      $message['mensaje']="Iniciando Sesión";
    }else{
      $message['status']=201;
      $message['mensaje']="Error prueba de nuevo";
    }
    echo json_encode($message);
  }
  public function __destruct(){
    $this->link = null;
  }
}
$obj = new login();
$obj->logueo();
 ?>
