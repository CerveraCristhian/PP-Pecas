<?php
/**
* Clase que envuelve una instancia de la clase PDO
* para el manejo de la base de datos
* <?php require_once $databaseDirectory;sesionvalida(); ?><!DOCTYPE html>
*/

require_once 'mysql_login.php';
session_start();

function encriptar($password){
    $options = ['cost' => 12];
    return password_hash($password, PASSWORD_DEFAULT, $options);
    //password_verify($password, $hash)
}

function esRFC($rfc){
    if (preg_match('/^[A-Z]{3,4}\d{6}[A-Z]{3}$/', $rfc)) {
        return true;
    }else{
        return false;
    }
}
function mensaje($arregloErrores, $mensajeArriba, $mensajeAbajo,$tipo){
    switch ($tipo) {
        case 0:
        echo "<div class=\"alert alert-success\" role=\"alert\">";
        $aviso= "¡Éxito!";
        break;
        case 1:
        echo "<div class=\"alert alert-info\" role=\"alert\">";
        $aviso= "¡Nota!";
        break;
        case 2:
        echo "<div class=\"alert alert-warning\" role=\"alert\">";
        $aviso= "¡Advertencia!";
        break;
        case 3:
        echo "<div class=\"alert alert-danger\" role=\"alert\">";
        $aviso= "¡Error!";
        break;
    }
    echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>
    <strong>".$aviso."</strong> " .  $mensajeArriba;
    foreach ($arregloErrores as $mensaje) {
        if(is_array($mensaje)){
            echo "<br>-> ";
            foreach ($mensaje as  $value) {
                echo $value .",";
            }
        }else{
            echo "<br>-> " . $mensaje;
        }

    }
    echo "<br><strong> ".$mensajeAbajo . "</strong>
    </div>";
}
function preregistro($clie_nombre, $clie_amaterno, $clie_apaterno, $clie_email, $clie_emailrazon, $clie_fechaingresosistema, $clie_razonsocial, $clie_observaciones, $clie_rfc, $clie_fax){
    //$clie_clienteid, $clie_nombre, $clie_amaterno, $clie_apaterno, $clie_email, $clie_emailrazon, $clie_fechaingresosistema, $clie_razonsocial, $clie_observaciones, $clie_rfc, $clie_fax
    $sql = "INSERT INTO `clientes`(`clie_nombre`, `clie_amaterno`, `clie_apaterno`, `clie_email`, `clie_emailrazon`, `clie_fechaingresosistema`, `clie_razonsocial`, `clie_observaciones`, `clie_rfc`, `clie_fax`) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $params = array($clie_nombre, $clie_amaterno, $clie_apaterno, $clie_email, $clie_emailrazon, $clie_fechaingresosistema, $clie_razonsocial, $clie_observaciones, $clie_rfc, $clie_fax);
    try{
        ///TODO
        $stmt = Database::getInstance()->getDb()->prepare($sql);
        $result = $stmt->execute($params);
        return Database::getInstance()->getDb()->lastInsertId();
    }
    catch(PDOException $ex){
        echo $ex->getMessage();
        return false;
        die("Error de consulta a la Base de Datos");
    }
}
function login($id, $pass){
    $login_ok = false;
    $_SESSION['usuario']=false;
    $consulta =
    "SELECT `user_usuarioid`,`user_name`,`user_password`,`Roles_rol_rolid`,`usr_salt` FROM `usuarios` WHERE `user_name` = :id";
    $query_params = array(':id' => $id);
    try{
        ///TODO
        $stmt = Database::getInstance()->getDb()->prepare($consulta);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        echo $ex->getMessage();
        return false;
        die("Error de consulta a la Base de Datos");
    }
    $row = $stmt->fetch();
    if($row){
        if($pass === $row['user_password'] ){
            unset($row['user_password']);
            unset($row['usr_salt']);
            $_SESSION['usuario'] = $row;
            return true;
        }
    }
    return $login_ok;
}
function loginUsuarioWeb($id, $pass){
    $login_ok = false;
    $_SESSION['usuario']=false;
    $consulta =
    "SELECT `usrw_usuarioid`, `usrw_nombre`, `usrw_password`, `usrw_rolid`, `usrw_salt`, `usrw_activo`, `usrw_descuento`, `Clientes_clie_clienteid` FROM `usuariosweb` WHERE `usrw_nombre` = :id";
    $query_params = array(':id' => $id);
    try{
        ///TODO
        $stmt = Database::getInstance()->getDb()->prepare($consulta);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        echo $ex->getMessage();
        return false;
        die("Error de consulta a la Base de Datos");
    }
    $row = $stmt->fetch();
    if($row){
        if($pass === $row['usrw_password'] AND $row['usrw_activo'] > 0  ){
            unset($row['usrw_password']);
            unset($row['usrw_salt']);
            $_SESSION['usuarioWeb'] = $row;
            return true;
        }
    }
    return $login_ok;
}
function sesionvalida(){

    if(empty($_SESSION['usuario'])){
        $path = 'index.php';
        if (file_exists($path)) {
            header("Location: ".$path);
            die("Bad Session");
        }
        $path = '../index.php';
        if (file_exists($path)) {
            header("Location: ".$path);
            die("Bad Session");
        }
        $path = '../../index.php';
        if (file_exists($path)) {
            header("Location: ".$path);
            die("Bad Session");
        }
    }

}
function sesionvalidaUsuarioWeb(){
    if(empty($_SESSION['usuarioWeb'])){
        $path = 'indexuw.php';
        if (file_exists($path)) {
            header("Location: ".$path);
            die("Bad Session");
        }
        $path = '../indexuw.php';
        if (file_exists($path)) {
            header("Location: ".$path);
            die("Bad Session");
        }
        $path = '../../indexuw.php';
        if (file_exists($path)) {
            header("Location: ".$path);
            die("Bad Session");
        }
    }

}

class Database
{

    /**
    * Única instancia de la clase
    */
    private static $db = null;

    /**
    * Instancia de PDO
    */
    private static $pdo;

    final private function __construct()
    {
        try {
            // Crear nueva conexión PDO
            self::getDb();
        } catch (PDOException $e) {
            // Manejo de excepciones
        }


    }

    /**
    * Retorna en la única instancia de la clase
    * @return Database|null
    */
    public static function getInstance()
    {
        if (self::$db === null) {
            self::$db = new self();
        }
        return self::$db;
    }

    /**
    * Crear una nueva conexión PDO basada
    * en los datos de conexión
    * @return PDO Objeto PDO
    */
    public function getDb()
    {
        if (self::$pdo == null) {
            self::$pdo = new PDO(
            'mysql:dbname=' . DATABASE .
            ';host=' . HOSTNAME .
            ';port:63343;',
            USERNAME,
            PASSWORD,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );

        // Habilitar excepciones
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    return self::$pdo;
}

/**
* Evita la clonación del objeto
*/
final protected function __clone()
{
}

function _destructor()
{
    self::$pdo = null;
}
}

?>
