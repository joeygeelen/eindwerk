<?php

define('DB_SERVER', 'ID81394_joey.db.webhosting.be');
define('DB_USERNAME', 'ID81394_joey');
define('DB_PASSWORD', 'joey12661901!');
define('DB_DATABASE', 'ID81394_joey');


$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

function SQLexec( $sql )
{
    global $conn;

    $result = $conn->query($sql);

    return $result;
}
?>