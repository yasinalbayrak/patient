<body style = "background-color: #DBF9FC;echo ; color: black;font-weight: 2000;font-style: italic;font-size: 20;text-align:left">
<?php

include "config.php";

if(!empty($_POST['ids']))
{
    $nurse_id = $_POST['ids'];
    $sql_statement = "DELETE FROM nurses WHERE n_id = $nurse_id";
    $result = mysqli_query($hospital_db, $sql_statement);
    echo "Succesfully deleted the nurse with the id " . $nurse_id .".";
    
}
else{
    echo "A problem is occured, please try again!";
}

?>

</body>