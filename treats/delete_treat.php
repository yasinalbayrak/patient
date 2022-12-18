
<?php

include "config.php";

if (!empty($_POST['treatment_no']))
{

    $treatment = $_POST['treatment_no'];
    
    $check_statement = "SELECT * FROM treats WHERE treatment_no = $treatment ";
    $result_check =  mysqli_query($hospital_db, $check_statement);
    
    
    if(mysqli_num_rows($result_check) != 0)
    {
        $sql_statement = "DELETE FROM treats WHERE treatment_no = $treatment ";
    
        $result = mysqli_query($hospital_db, $sql_statement);
        
        header ("Location: admin_treat.php");
    }
    
    
    }
    
else{
    $newURL = "admin_treat.php";
    
    echo "The form is not set." ."<Br><Br><Br><Br>".  "You are redirecting to the deletion page..." ;
    header( "refresh:4;url=".$newURL );
}

?>

