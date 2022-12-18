
<?php

include "config.php";

if (!empty($_POST['mcode']))
{

    $selection_code = $_POST['mcode'];
    
    $check_statement = "SELECT * FROM medicine WHERE mcode = $selection_code ";
    $result_check =  mysqli_query($hospital_db, $check_statement);
    
    
    if(mysqli_num_rows($result_check) != 0)
    {
        $sql_statement = "DELETE FROM medicine WHERE mcode = $selection_code ";
    
        $result = mysqli_query($hospital_db, $sql_statement);
        
        header ("Location: admin_medicine.php");
    }
    
    
    }
    
else{
    $newURL = "admin_medicine.php";
    
    echo "The form is not set." ."<Br><Br><Br><Br>".  "You are redirecting to the deletion page..." ;
    header( "refresh:4;url=".$newURL );
}

?>

