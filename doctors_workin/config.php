
<?php

$hospital_db = mysqli_connect('localhost','root','','CS306_project');
mysqli_set_charset($hospital_db, 'utf8mb4');

if($hospital_db->connect_errno > 0){
    die('Unable to connect to database [' . $hospital_db->connect_error . ']');
}

?>