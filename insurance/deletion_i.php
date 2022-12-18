<?php 

include "config.php";

if (isset($_POST['policy_id']) ){

    $policy_id = $_POST['policy_id'];


    $sql_statement = "DELETE FROM insurance WHERE policy_id = $policy_id" ;

    $result = mysqli_query($hospital_db, $sql_statement);
        
    header ("Location: insurance_admin.php");


}

else
{


    $newURL = "insurance_admin.php";
    
    echo "The form is not set." ."<Br><Br><Br><Br>".  "You are redirecting to the deletion page..." ;
    header( "refresh:4;url=".$newURL );


}

?>