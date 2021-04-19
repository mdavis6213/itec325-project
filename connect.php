<?php
require_once('dbLogin.php');

$connect = mysqli_connect('localhost',$DB_USERNAME,$DB_PASSWORD,'tech_takeout');

if(!$connect){
    echo 'Connection error: '. mysqli_connect_error();
}

?>