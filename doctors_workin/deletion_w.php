<?php 

include "config.php";

if (isset($_POST['worlog_id']) ){

    $worlog_id = $_POST['worlog_id'];


    $sql_statement = "DELETE FROM doctor_worksin WHERE workLog_no = $worlog_id" ;

    $result = mysqli_query($hospital_db, $sql_statement);
        
    header ("Location: workinfo_admin.php");


}

else
{


    $newURL = "workinfo_admin.php";
    
    echo "The form is not set." ."<Br><Br><Br><Br>".  "You are redirecting to the deletion page..." ;
    header( "refresh:4;url=".$newURL );


}

?>