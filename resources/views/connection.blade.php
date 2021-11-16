define('SERVER', "localhost");
define('USER', "root");
define('PASSWORD', "");
define('DATABASE', "ris");
 $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
 try {
    $con = new PDO(SERVER,USER,PASSWORD,DATABASE);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}