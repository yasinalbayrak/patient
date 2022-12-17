<?php 

include "config.php";

if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

$sql_statement = "DELETE FROM hospitals WHERE hospital_id = $selection_id";

$result = mysqli_query($hospital_db, $sql_statement);

header ("Location: hospital_admin.php");

}

else
{


    $newURL = "hospital_admin.php";
    
    echo "The form is not set." ."<Br><Br><Br><Br>".  "You are redirecting to the deletion page..." ;
    header( "refresh:5;url=".$newURL );


}

?>