<?php require_once $databaseDirectory;sesionvalida(); ?><!DOCTYPE html>
<html ng-app="productoApp" ng-controller="productoController">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../assets/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Placed js at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.min.js"></script>
<script src="js/productoApp.js"></script>
<script src="js/directivas.js"></script>

<!-- This is what you need -->
<script src="../../plugins/sweetalert-master/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="../../plugins/sweetalert-master/dist/sweetalert.css">
<!--.......................-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <ppc-header></ppc-header>
 <ppc-aside></ppc-aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Productos

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio </a></li>
        <li><a href="#">Productos</a></li>
        <li class="active">Productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
<form role="form" name="formulario">
<div class="box-body">

<div class="form-group">
<label>Categoria</label>
<select class="form-control" ng-options="item as item.cate_nombre for item in categoria.categoria track by item.cate_nombre" ng-model="selectedcategoria" placeholder="Seleccionar Categoria" ng-change="OnCategoriaChange(selectedcategoria)"></select>
<label>SubCategoria</label>
<select class="form-control" ng-options="item as item.subc_nombre for item in subcategoria.subcategoria track by item.subc_nombre" ng-model="selectedsubcategoria"></select>
<label>Marca</label>
<select class="form-control" ng-options="item as item.marc_nombre for item in marca.marca track by item.marc_nombre" ng-model="selectedmarca"></select>
<label>Medida</label>
<select class="form-control" ng-options="item as item.medi_nombre for item in medida.medida track by item.medi_nombre" ng-model="selectedmedida"></select>
<label>Colores</label>
<select class="form-control" ng-options="item as item.colo_nombre for item in colores.colores track by item.colo_nombre" ng-model="selectedcolores"></select>
<label>Calidad</label>
<select class="form-control" ng-options="item as item.cali_nombre for item in calidad.calidad track by item.cali_nombre" ng-model="selectedcalidad"></select>
<label>Moneda</label>
<select class="form-control" ng-options="item as item.mone_nombre for item in moneda.moneda track by item.mone_nombre" ng-model="selectedmoneda"></select>
<label for="prod_nombre">Nombre</label><input type="text" class="form-control" name="prod_nombre" id="prod_nombre" placeholder="Capturar Nombre" ng-model="prod_nombre">
<label for="prod_descripcion">Descripcion</label> <textarea type="text" class="form-control" name="prod_descripcion" id="prod_descripcion" ng-model="prod_descripcion" rows="4"></textarea>
<label for="prod_descripcion">Descripcion Ingles</label> <textarea type="text" class="form-control" name="prod_descripcion" id="prod_descripcion" ng-model="prod_descripcioningles" rows="6"></textarea>

<label for="prod_precioestandar">Precio Estandar</label><input type="text" class="form-control" name="prod_precioestandar" id="prod_precioestandar" placeholder="Capturar Precio Estandar" ng-model="prod_precioestandar" >
<label for="prod_preciolista">Precio de Lista</label><input type="text" class="form-control" name="prod_preciolista" id="prod_preciolista" placeholder="Capturar Precio de Lista" ng-model="prod_preciolista">
<label for="prod_garantia">Garantia (Meses)</label><input type="text" class="form-control" name="prod_garantia" id="prod_garantia" placeholder="Capturar Garantia" ng-model="prod_garantia">
<label for="prod_tamano">Tamaño</label><input type="text" class="form-control" name="prod_tamano" id="prod_tamano" placeholder="Capturar Tamaño" ng-model="prod_tamano">
<label for="prod_stock">Stock</label><input type="text" class="form-control" name="prod_stock" id="prod_stock" placeholder="Capturar Stock" ng-model="prod_stock">
<label for="prod_imagen">prod_imagen</label><input type="text" class="form-control" name="prod_imagen" id="prod_imagen" placeholder="Capturar prod_imagen" ng-model="prod_imagen">
<label for="prod_activo">Activo</label><input type="text" class="form-control" name="prod_activo" id="prod_activo" placeholder="Capturar prod_activo" ng-model="prod_activo">
<label for="prod_costo">Costo</label><input type="text" class="form-control" name="prod_costo" id="prod_costo" placeholder="Capturar Costo" ng-model="prod_costo">
<label for="prod_margen">Margen</label><input type="text" class="form-control" name="prod_margen" id="prod_margen" placeholder="Capturar Margen" ng-model="prod_margen">


</div>



<div class="box-footer">
<button class="btn btn-primary" ng-click="Guardar()">Guardar</button>
</div>
</form>


<div class="box-body table-responsive no-padding">
<table id="example" class="display"  cellspacing="0" width="100%">
  <thead>
<tr>

<th>Nombre</th>
<th>Precio Estandar</th>
<th>Precio Lista</th>
<th>Garantia</th>
<th>Tamaño</th>
<th>Stock</th>
<th>prod_imagen</th>
<th>Activo</th>
<th>Costo</th>
<th>Margen</th>
<th>Medida</th>
<th>Colores</th>
<th>Calidad</th>
<th>Marca</th>
<th>Moneda</th>
<th>SubCategoria</th>
<th>Descripcion</th>
<th>Descripcion en Ingles</th>
</tr>
</thead>
<tbody>


<form >
<tr ng-repeat="item in producto.producto | filter:test">

<td>{{item.prod_nombre}}</td>
<td>{{item.prod_precioestandar}}</td>
<td>{{item.prod_preciolista}}</td>
<td>{{item.prod_garantia}}</td>
<td>{{item.prod_tamano}}</td>
<td>{{item.prod_stock}}</td>
<td>{{item.prod_imagen}}</td>
<td>{{item.prod_activo}}</td>
<td>{{item.prod_costo}}</td>
<td>{{item.prod_margen}}</td>
<td>{{item.medi_nombre}}</td>
<td>{{item.colo_nombre}}</td>
<td>{{item.cali_nombre}}</td>
<td>{{item.marc_nombre}}</td>
<td>{{item.mone_nombre}}</td>
<td>{{item.subc_nombre}}</td>
<td>{{item.prod_descripcion}}</td>
<td>{{item.prod_descripcioningles}}</td>


<td>
<button ng-click="Editar(item)" class="btn btn-primary" >Editar</button>
</td>
<td>
<button ng-click="EliminarSeleccionado(item)" class="btn btn-danger" >Eliminar</button>
</td>

</tr>
</form>
</tbody>
</table>
</div>

        </div>

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/js/demo.js"></script>
</body>
</html>
