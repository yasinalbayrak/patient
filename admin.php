<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<body style = "text-align: center;font-style:italic;background-color: rgb(96, 187, 187);background-image:url('pht.jpg'); background-attachment: fixed;
    background-size: 100% 100%;">
        <br><br><br><br><br><br><br><br><br><br><h3 style="color: rgb(6, 123, 248);text-shadow:3px 3px rgb(96, 187, 187);font-weight: 1000;font-size: 40;padding-bottom:0px;">Delete the patients</h3>
<select name="ids">

<?php

$sql_command = "SELECT * FROM patients";

$myresult = mysqli_query($hospital_db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $patient_id = $id_rows['p_id']; 
        $patient_name = $id_rows['p_name']; 
        $age = $id_rows['age']; 
        $allergy = $id_rows['P_allergicreaction']; 
        $diagnosis = $id_rows['p_diagnosis']; 
        $address = $id_rows['p_address']; 
        $gender = $id_rows['gender']; 

        echo "<option value=$patient_id>". $patient_name . " " . $age . " ". $allergy . " ". $diagnosis. " " . $address. " ". $gender.  "</option>";
    }

?>

</select>
<button style = "background-color: rgb(142, 205, 242);">DELETE</button>
</form>
