<?php $ruta= "../views/modules/" ?>

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
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Cliente</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="" data-page="cliente/registrar.php"><i class="fa fa-circle-o"></i> Registrar</a></li>
            <li><a href="" data-page="cliente/listar.php"><i class="fa fa-circle-o"></i> Listar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Empleado</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="" data-page="empleado/listar.php"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li><a href="" data-page="empleado/registrar.php"><i class="fa fa-circle-o"></i> Registrar</a></li>
          </ul>
        </li>


         <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Categoria Producto</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="" data-page="categoriaproducto/listar.php"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li><a href="" data-page="categoriaproducto/registrar.php"><i class="fa fa-circle-o"></i> Registrar</a></li>
          </ul>
        </li>



        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Modelo</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="" data-page="modelo/listar.php"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li><a href="" data-page="modelo/registrar.php"><i class="fa fa-circle-o"></i> Registrar</a></li>
          </ul>
        </li>


                <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Talla</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="" data-page="talla/listar.php"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li><a href="" data-page="talla/registrar.php"><i class="fa fa-circle-o"></i> Registrar</a></li>
          </ul>
        </li>


        <!--<li>
          <a href="#">
            <i class="fa fa-th"></i> <span>Producto</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Producto</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="" data-page="producto/listar.php"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li><a href="" data-page="producto/registrar.php"><i class="fa fa-circle-o"></i> Registrar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Modelo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="" data-page="modelo/listar.php"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li><a href="" data-page="modelo/registrar.php"><i class="fa fa-circle-o"></i> Registrar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Tela</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="" data-page="tela/listar.php"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li><a href="" data-page="tela/registrar.php"><i class="fa fa-circle-o"></i> Registrar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
           
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>