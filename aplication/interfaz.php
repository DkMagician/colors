<?php
use Firebase\JWT\JWT;
if(isset($_COOKIE["cookie_jwt"])){
  require "../api/vendor/autoload.php";
  $jwt= $_COOKIE["cookie_jwt"];
  $key="QmkwbG94aUAxNSEuNWtsMzVPLg==";
  $decoded= JWT::decode($jwt,$key,array('HS256'));
  $admin=$decoded->admin;
  require_once "../api/colors.php";
    $obj = new colores();
    $data= $obj->crudcolors();
}else{
  header("Location: http://localhost/colors/aplication/index.php");
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
  <link rel="stylesheet" href="../aplication/lib/css/bootstrap.min.css">
  <link rel="stylesheet" href="../aplication/css/main_css.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="../aplication/lib/js/bootstrap.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/cbe7593911.js" crossorigin="anonymous"></script>
  <script src="../api/js/api.js"></script>
  <title>colores</title>
</head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
          <div class="curv_div" >
            <div class="row">
              <div class="col-xl-1 col-lg-1 col-md-2 col-3 center">
                <p onclick="logout();"; class="pointer"><i class="fas fa-sign-out-alt"></i> Salir</p>
              </div>
              <div  class="col-xl-10 col-lg-10 col-md-9 col-5">
                <h1 class="fx_tit1">Colores</h1>
              </div>
              <div class="col-xl-1 col-lg-1 col-md-1 col-4 center">
                <?php if($admin==1){?>
                <i data-toggle="modal" data-target="#addcolor" class="fas fa-plus-circle fx_iconplus"></i>
              <?php }else{ ?>
                    <p></p>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <div style="padding-top: 0.5%;" class="col-xl-12 col-lg-12 col-md-12 col-12">
          <div class="row">
            <?php
              $datos= json_decode($data);
              for ($i=0; $i < count($datos->resultados); $i++) {
              ?>
              <div class="col-xl-4 col-lg-4 col-md-6 col-12 fx_cards">
                <div class="curv_div fx_divcard shadowefect" style="background: <?= $datos->resultados[$i]->color ?> ;">
                  <div class="row">
                    <div class="col-xl-10 col-lg-7 col-md-8 col-8 fx_colorfont fx_fontsizen">
                    <p class="fx_left"><?= $datos->resultados[$i]->year ?></p>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-4 center">
                      <?php if($admin==1){?>
                        <i onclick="readcolor(<?= $datos->resultados[$i]->idcolor ?>)" class="far fa-edit pointer fx_colorfont fx_fontsizen fx_top" data-toggle="modal" data-target="#editcolor"></i>
                        <i onclick="sendid(<?= $datos->resultados[$i]->idcolor ?>)" class="fas fa-trash-alt pointer fx_colorfont fx_fontsizen " data-toggle="modal" data-target="#deletecolor"></i>
                      <?php } ?>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                      <p>&nbsp;</p>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 center fx_colorfont fx_fontsizen">
                      <p><?= $datos->resultados[$i]->name ?></p>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 center fx_colorfont fx_fontmedium fx_weightfont">
                    <p><?= $datos->resultados[$i]->color ?></p>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                      <p>&nbsp;</p>
                    </div>
                    <div style="text-align: right" class="col-xl-12 col-lg-12 col-md-12 col-12 fx_colorfont fx_fontsizen">
                    <p class="fx_right"><?= $datos->resultados[$i]->pantone ?></p>
                    </div>
                  </div>
                </div>
              </div>
            <?php
              }
             ?>
             <div style="margin-top: 0.5%;" class="col-xl-12 col-lg-12 col-md-12 col-12 curv_div">
               <div class="row">
                <?php
                  if ($datos->total_reg) {
                    if (($datos->pag - 1) > 0) {
                        echo "<div class='col-xl-2 col-lg-2 col-md-2 col-5'> <a class='fx_fontpag' href='http://localhost/colors/aplication/interfaz.php?pagina=".($datos->pag-1)."'>< Anterior</a> </div> <div class='col-xl-8 col-lg-8 col-md-8 col-2'> </div>";
                    } else {

                      echo "<div class='col-xl-2 col-lg-2 col-md-2 col-5'> <span>&nbsp;</span> </div><div class='col-xl-8 col-lg-8 col-md-8 col-2'> </div>";
                    }

                    if (($datos->pag + 1)<=$datos->total_pag) {
                        echo "<div style='text-align: right;' class='col-xl-2 col-lg-2 col-md-2 col-5'> <a class='fx_fontpag' href='http://localhost/colors/aplication/interfaz.php?pagina=".($datos->pag+1)."'>Siguiente ></a> </div>";
                    } else {
                      echo "<div class='col-xl-2 col-lg-2 col-md-2 col-5'> <span>&nbsp;</span> </div>";
                    }
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addcolor" tabindex="-1" role="dialog" aria-labelledby="addcolor" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addcolortittle">Añadir nuevo color</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
              <div>
                <form class="fx_form">
                  <div style="margin: 1%;" class="form-group">
                    <label for="nombre_del_color">Nombre del color</label><br/>
                    <input class="efect_inputs" id="namec" type="text" name="namec">
                  </div>
                  <div style="margin: 1%;" class="form-group">
                    <label for="Codigo_hexadecimal">Código hexadecimal</label><br/>
                    <input class="efect_inputs" minlength="7" maxlength="7" id="codhex" type="text" name="codhex">
                  </div>
                  <div style="margin: 1%;" class="form-group">
                    <label for="Codigo_pantone">Código pantone</label><br/>
                    <input class="efect_inputs" minlength="6" maxlength="6" id="cotpat" type="text"name="cotpat">
                  </div>
                  <div style="margin: 1%;" class="form-group">
                    <label for="year">Año</label><br/>
                    <input class="efect_inputs" minlength="4" maxlength="4" id="year" type="number" name="year">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button onclick="addcolor()" type="button" class="btn btn-primary">Añadir</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editcolor" tabindex="-1" role="dialog" aria-labelledby="addcolor" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div id="editcolortittle">

            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
              <form class="fx_form">
                <div style="margin: 1%;" class="form-group">
                  <label for="nombre_del_color">Nombre del color</label><br/>
                  <input class="efect_inputs" id="namec2" type="text" name="namec">
                </div>
                <div style="margin: 1%;" class="form-group">
                  <label for="Codigo_hexadecimal">Código hexadecimal</label><br/>
                  <input class="efect_inputs" minlength="7" maxlength="7" id="codhex2" type="text" name="codhex">
                </div>
                <div style="margin: 1%;" class="form-group">
                  <label for="Codigo_pantone">Código pantone</label><br/>
                  <input class="efect_inputs" minlength="6" maxlength="6" id="cotpat2" type="text" name="cotpat">
                </div>
                <div style="margin: 1%;" class="form-group">
                  <label for="year">Año</label><br/>
                  <input class="efect_inputs" min="4" max="4" id="year2" type="number"  name="year">
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button onclick="editcolor()" type="button" class="btn btn-primary">Editar</button>
            <input id="idhidden" type="hidden" value="">
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deletecolor" tabindex="-1" role="dialog" aria-labelledby="deletecolor" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deletecolortittle">¿Eliminar color?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
              <div>
                ¿Desea eliminar el color?
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button onclick="deletecolor()" type="button" class="btn btn-primary">Eliminar</button>
            <input id="todelete" type="hidden">
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
