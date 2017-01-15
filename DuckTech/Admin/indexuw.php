<?php
require_once $databaseDirectory; //@"^([A-Z\s]{4})\d{6}([A-Z\w]{3})$
$login_ok=false;
$arregloErrores= array();
if(empty($_POST)){
    $login_ok=false;
}else {
    //$submitted_username = $_POST['username'];
    $login_ok = loginUsuarioWeb($_POST['username'],$_POST['password']);
    if($login_ok==false){
        //array_push($arregloErrores, 'Error de Inicio de Sesión: Verifique que su cuenta de usuario y contraseña sean correctas.');
    }
}
if($login_ok){
    header("Location: ../web/Intensely/index.html");
    die("Redirecting to: ../web/Intensely/index.html");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Log in </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a><b>Acceder a la tienda</b> </a>
        </div>
        <?php
        if (!empty($arregloErrores)) {
            //u_mensaje($arregloErrores, "Acceso denegado", "",3);
        }
        ?>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <div class="">
                <img class="center" style='display: block;margin: auto;width: 300px;height: 150px;padding: 0px 0px;' src="../web/Intensely/assets/images/logopng.png" alt="logo"></a>
            </div>
            <p class="login-box-msg">Iniciar Sesión</p>

            <form action="indexuw.php" method="post">
                <div class="form-group has-feedback">
                    <input type="input" class="form-control" required name="username" placeholder="RFC">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" required name="password" placeholder="Contraseña">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-12">
                        <input class="center" type="checkbox" name="vehicle" required value="Bike"> Acepto los <a href="#">términos y cóndiciones.</a>
                        <br><br>
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
                        <a class ="col-md-12" href="#">Olvidé mi contraseña.</a>
                        <br><br>
                        <a class="btn btn-danger btn-flat" href="../web/Intensely/index.html">Regresar</a>
                        <a class="btn btn-default btn-flat" href="registrouw.php">Registrarme</a>

                    </div>

                    <!-- /.col -->
                </div>
            </form>


        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 2.2.3 -->
    <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
    </script>
</body>
</html>