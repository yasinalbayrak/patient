<?php 

include "config.php";

?>

<form action="delete_nurse.php" method="POST">
<body style = "text-align: center;font-style:italic;background-color: rgb(96, 187, 187);background-image:url('nurse.jpg'); background-attachment: fixed;
    background-size: 100% 100%;">
        <br><br><br><br><br><br><br><br><br><br><h3 style="color: rgb(6, 123, 248);text-shadow:3px 3px rgb(96, 187, 187);font-weight: 1000;font-size: 40;padding-bottom:0px;">Delete the nurses</h3>
<select name="ids">

<?php

$sql_command = "SELECT * FROM nurses";

$myresult = mysqli_query($hospital_db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $n_id = $id_rows['n_id']; 
        $n_salary = $id_rows['n_salary'];
        $n_name = $id_rows['n_name']; 
        $age = $id_rows['age']; 
        $address = $id_rows['n_address']; 
        $gender = $id_rows['gender']; 
        

        echo "<option value=$n_id>" . $n_salary . " " .$n_name." ". $age . " ". $address. " ". $gender.   "</option>";
    }

?>

</select>
<button style = "background-color: rgb(142, 205, 242);">DELETE</button>
</form>
