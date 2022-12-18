<?php 

include "config.php";

if (isset($_POST['covering_log_num']) ){

    $covering_log_num = $_POST['covering_log_num'];


    $sql_statement = "DELETE FROM covered_by WHERE covering_log_num = $covering_log_num" ;

    $result = mysqli_query($hospital_db, $sql_statement);
        
    header ("Location: covered_admin.php");


}

else
{


    $newURL = "covered_admin.php";
    
    echo "The form is not set." ."<Br><Br><Br><Br>".  "You are redirecting to the deletion page..." ;
    header( "refresh:4;url=".$newURL );


}

?>