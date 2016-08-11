<?php
/**
* Clase que envuelve una instancia de la clase PDO
* para el manejo de la base de datos
*/

require_once 'mysql_login.php';
session_start();

function encriptar($password){
    $options = ['cost' => 12];
    return password_hash($password, PASSWORD_DEFAULT, $options);
    //password_verify($password, $hash)
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
            var_dump($row);
            return true;
        }
    }
    return $login_ok;
}
function sesionvalida(){
    if(empty($_SESSION['usuario']))
    {
        header("Location: index.php");
        die("Redirecting to index.php");
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
