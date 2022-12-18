<?php 

include "config.php";

if (isset($_POST['pres_no']) ){

    $press_no = $_POST['pres_no'];


    $sql_statement = "DELETE FROM prescribed WHERE pres_no = $press_no" ;

    $result = mysqli_query($hospital_db, $sql_statement);
        
    header ("Location: prescribed_admin.php");


}

else
{


    $newURL = "prescribed_admin.php";
    
    echo "The form is not set." ."<Br><Br><Br><Br>".  "You are redirecting to the deletion page..." ;
    header( "refresh:4;url=".$newURL );


}

?>