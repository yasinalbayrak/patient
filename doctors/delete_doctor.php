<body style = "background-color: #DBF9FC;echo ; color: black;font-weight: 2000;font-style: italic;font-size: 20;text-align:left">
<?php

include "config.php";

if(!empty($_POST['ids']))
{
    $doctor_id = $_POST['ids'];
    $sql_statement = "DELETE FROM doctors WHERE d_id = $doctor_id";
    $result = mysqli_query($hospital_db, $sql_statement);
    echo "Succesfully deleted the doctor with the id " . $doctor_id .".";
    
}
else{
    echo "A problem is occured, please try again!";
}

?>

</body>