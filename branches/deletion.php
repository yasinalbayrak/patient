<?php 

include "config.php";

if (isset($_POST['hospital_id']) and !empty($_POST['branch_code'])){

$selection_id = $_POST['hospital_id'];
$selection_bcode = $_POST['branch_code'];
$check_statement = "SELECT * FROM has_branches WHERE hospital_id = $selection_id AND branch_code =$selection_bcode";
$result_check =  mysqli_query($hospital_db, $check_statement);


if(mysqli_num_rows($result_check) != 0)
{
    $sql_statement = "DELETE FROM has_branches WHERE hospital_id = $selection_id AND branch_code = $selection_bcode";

    $result = mysqli_query($hospital_db, $sql_statement);
    
    header ("Location: branch_admin.php");
}
else
{
    $newURL = "branch_admin.php";
    echo "Wrong branch code. Be Carefull!"."<Br><Br><Br><Br>".  "You are redirecting to the deletion page..." ;
    header( "refresh:5;url=".$newURL );
}

}

else
{


    $newURL = "branch_admin.php";
    
    echo "The form is not set." ."<Br><Br><Br><Br>".  "You are redirecting to the deletion page..." ;
    header( "refresh:4;url=".$newURL );


}

?>