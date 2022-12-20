<?php

include "config.php";

if (!empty($_POST['n_id']))
{

    $selection_code = $_POST['n_id'];
    
    $check_statement = "SELECT * FROM nurses WHERE n_id = $selection_code ";
    $result_check =  mysqli_query($hospital_db, $check_statement);
    
    
    if(mysqli_num_rows($result_check) != 0)
    {
        $sql_statement = "DELETE FROM nurses WHERE n_id = $selection_code ";
    
        $result = mysqli_query($hospital_db, $sql_statement);
        
        header ("Location: admin_nurse.php");
    }
    
    
    }
    
else{
    $newURL = "admin_nurse.php";
    
    echo "The form is not set." ."<Br><Br><Br><Br>".  "You are redirecting to the deletion page..." ;
    header( "refresh:4;url=".$newURL );
}

?>

