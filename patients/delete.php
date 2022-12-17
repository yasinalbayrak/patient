<body style = "background-color: #DBF9FC;echo ; color: black;font-weight: 2000;font-style: italic;font-size: 20;text-align:left">
<?php

include "config.php";

if(!empty($_POST['ids']))
{
    $patient_id = $_POST['ids'];
    $sql_statement = "DELETE FROM patients WHERE p_id = $patient_id";
    $result = mysqli_query($hospital_db, $sql_statement);
    echo "Succesfully deleted the patient with the id " . $patient_id .".";
    //echo "Patient " .$name. "with the id" $patient_id "is deleted from the data base.";
}
else{
    echo "A problem is occured, please try again!";
}

?>

</body>