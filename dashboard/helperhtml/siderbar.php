<?php
    
    $_POST["opcion"] = "listar";//mando como valor predeterminado a mi opción hacia mi controlador
    include '../src/pagina/PaginaController.php';
    $paginas = json_decode($lista);//recupero la lista obtenido en la variable global $listar

?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["apellidos"];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>

      <ul class="sidebar-menu"> 

        <li class="header">MAIN NAVIGATION</li>
        <?php

            $permisoModuloEmpleado = $_SESSION["idmodulo"];
            $c = 0;//contador

            for( $i=0; $i < count($paginas->{"modulo"}); $i++ ){
                $idmodulo = $paginas->{"modulo"}[ $i ]->idmodulo;
                $modulo = $paginas->{"modulo"}[ $i ]->nombre;

                //Validacion con el idmodulo de la sesion
                if( isset($permisoModuloEmpleado[$c] ) && $permisoModuloEmpleado[$c] == $idmodulo ){
                  $c++;
        ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa fa-folder"></i>
                    <span><?php echo $modulo; ?></span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span>
                </a>
                <ul class="treeview-menu">

                <?php 
                    for($j=0; $j < count($paginas->{"data"}); $j++){
                        $url = $paginas->{"data"}[ $j ]->pagina;
                        $posicion = strpos($url, "/") + 1;
                        $archivo = substr($url, $posicion);
                        $length = strlen($archivo) - 4;
                        $pagina = substr($archivo, 0, $length);

                        $data_idmodulo = $paginas->{"data"}[ $j ]->idmodulo;
                        
                        if( $idmodulo == $data_idmodulo ){
                ?>
                    <li><a href="" data-page="<?php echo $url; ?>"><i class="fa fa-file-text-o"></i> <?php echo ucwords($pagina); ?></a></li>
                <?php  } } ?>
                </ul>
            </li>
        <?php  } }?>
   
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>