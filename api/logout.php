<?php
class salir{
  public function logout(){
    setcookie('cookie_jwt', 'valor', time() - 10, "/", false, false, true);

    $message= array();
    $message['status']=200;

    echo json_encode($message);
  }
}
$obj = new salir();
$obj->logout();
 ?>
