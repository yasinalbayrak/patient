<?php 

include "config.php";

?>

<form action="delete_doctor.php" method="POST">
<body style = "text-align: center;font-style:italic;background-color: rgb(96, 187, 187);background-image:url('pht.jpg'); background-attachment: fixed;
    background-size: 100% 100%;">
        <br><br><br><br><br><br><br><br><br><br><h3 style="color: rgb(6, 123, 248);text-shadow:3px 3px rgb(96, 187, 187);font-weight: 1000;font-size: 40;padding-bottom:0px;">Delete the doctors</h3>
<select name="ids">

<?php

$sql_command = "SELECT * FROM doctors";

$myresult = mysqli_query($hospital_db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $d_id = $id_rows['d_id']; 
        $d_salary = $id_rows['d_salary'];
        $d_name = $id_rows['d_name']; 
        $age = $id_rows['age']; 
        $address = $id_rows['d_address']; 
        $gender = $id_rows['gender']; 
        $specialization = $id_rows['specializaiton'];

        echo "<option value=$d_id>" . $d_salary . " " .$d_name." ". $age . " ". $address. " ". $gender." ".$specialization.   "</option>";
    }

?>

</select>
<button style = "background-color: rgb(142, 205, 242);">DELETE</button>
</form>
