<form action="select_doctor.php" method="POST" accept-charset="utf-8" target = "_self" > 
 
    
    <body style = ";font-weight:1000;text-align: center;font-style: italic;background-color: rgb(96, 187, 187);margin-top:100px;background-image:url(pht.jpg);background-size: 100% 100%;background-attachment: fixed">

    <h3 style="color: rgb(6, 123, 248);text-shadow:3px 3px rgb(96, 187, 187);font-weight: 1000;font-size: 40;padding-bottom:0px;"> Filter The Doctors</h3>
        
         
        Gender:
        <select name="gender" style = "width: 150px;">
        <option value="3">All</option>
        <option value="1">Male</option>
        <option value="2">Female</option>
        
        </select>

    Doctor Name:
    <input type="text" id="d_name" name="d_name" style = "width: 150px;">
    
    
    <br><br>Address:
        <input type="text" id="d_address" name="d_address" style = "width: 150px;"> 
   Specializaiton:
        <input type="text" id="specializaiton" name="specializaiton" style = "width: 150px;"> 

    Min Age : 
        <input type ="text" id = "age_min" name = "age_min" style = "width: 150px;" >    
    Max Age :
        <input type ="text" id = "age_max" name = "age_max"  style = "width: 150px;">    


    Min Salary : 
        <input type ="text" id = "salary_min" name = "salary_min" style = "width: 150px;" >    
    Max Salary :
        <input type ="text" id = "salary_max" name = "salary_max"  style = "width: 150px;"> 

    <br><br> <input type="submit" value="Filter"
                style="background-color:rgb(242, 142, 142);
                border: 2px solid #0a0909;" >
                

    </body>


<?php 

include "config.php"; // Makes mysql connection
if(!empty($_POST))
{
    if (!empty($_POST['d_address']) )
    {  $address = $_POST['d_address'];}
    if (!empty($_POST['specialization']) )
    {  $diagnosis = $_POST['specialization'];}
    
    
    if (!empty($_POST['age_min']) ) $age_min = $_POST['age_min'];
    else  $age_min = 0;
    
    if (!empty($_POST['age_max']) ) $age_max = $_POST['age_max'];
    else  $age_max = PHP_INT_MAX;
    
    if($_POST['gender'] == 1) $gender = "Man";
    if($_POST['gender'] == 2) $gender = "Woman";
    if($_POST['gender'] == 3) $gender = "All";
    
    
    
    if (!empty($_POST['d_address']) and (!empty($_POST['specializaition']) and (!empty($_POST['d_salary']) and $gender != "All" )  ))
        $sql_statement = "SELECT * FROM doctors WHERE gender = '$gender' AND d_salary = '$d_salary' AND specialization = '$specialization'AND age < $age_max AND age > $age_min AND d_address = '$address'";
    else if(empty($_POST['address']) and  (!empty($_POST['specializaiton']) ))
    {
        if(!empty($_POST['d_salary']) and $gender != "All")
            $sql_statement = "SELECT * FROM doctors WHERE gender = '$gender' AND d_salary = '$d_salary' AND specializaiton = '$specializaiton'AND age <= $age_max AND age >= $age_min ";
        else if (!empty($_POST['d_salary']) and $gender != "All")
            $sql_statement = "SELECT * FROM doctors WHERE gender = '$gender' AND specialization = '$specialization'AND age <= $age_max AND age >= $age_min ";
        else if(!empty($_POST['d_salary']) and $gender == "All")
            $sql_statement = "SELECT * FROM doctors WHERE gender = '$gender' AND specialization = '$specialization' AND  d_salary = '$d_salary' AND age <= $age_max AND age >= $age_min ";
        else
            $sql_statement = "SELECT * FROM doctors WHERE specialization = '$specialization' AND age <= $age_max AND age >= $age_min ";
            
    }
        
    else if(empty($_POST['specializaiton']) and !empty($_POST['d_address']))
    {
        if($allergicreaction != "All" and $gender != "All")
            $sql_statement = "SELECT * FROM doctors WHERE gender = '$gender' AND P_allergicreaction = '$allergicreaction'AND age <= $age_max AND age >= $age_min AND d_address = '$address'";
        else if ($allergicreaction == "All" and $gender != "All")
            $sql_statement = "SELECT * FROM doctors WHERE gender = '$gender' AND age <= $age_max AND age >= $age_min AND d_address = '$address'";
        else if($allergicreaction != "All" and $gender == "All")
            $sql_statement = "SELECT * FROM doctors WHERE P_allergicreaction = '$allergicreaction' AND age <= $age_max AND age >= $age_min AND p_address = '$address'";
        else
            $sql_statement = "SELECT * FROM doctors WHERE age <= $age_max AND age >= $age_min AND d_address = '$address' ";
    }
    else
    {
        if($allergicreaction != "All" and $gender != "All")
            $sql_statement = "SELECT * FROM doctors WHERE gender = '$gender' AND P_allergicreaction = '$allergicreaction'AND age <= $age_max AND age >= $age_min";
        else if ($allergicreaction == "All" and $gender != "All")
            $sql_statement = "SELECT * FROM doctors WHERE gender = '$gender' AND age <= $age_max AND age >= $age_min ";
        else if($allergicreaction != "All" and $gender == "All")
            $sql_statement = "SELECT * FROM doctors WHERE P_allergicreaction = '$allergicreaction' AND age <= $age_max AND age >= $age_min" ;
        else
            $sql_statement = "SELECT * FROM doctors WHERE age <= $age_max AND age >= $age_min ";
    
    }
    
    
    $result = mysqli_query($hospital_db, $sql_statement); // Executing query
    
    
    
    if (mysqli_num_rows($result) == 0)
    {
        echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "No doctor has been found in that criteria.";
    }
    else  
    {
        echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
    }    

    while($row = mysqli_fetch_assoc($result)) { // Iterating the result
        $d_id = $row['d_id']; 
        #$patient_name  = iconv('UTF-8', 'ASCII//TRANSLIT', $row['p_name']);
        $doctor_name = $row['d_name'];
        $age = $row['age']; 
        $allergy = $row['P_allergicreaction']; 
        $diagnosis = $row['p_diagnosis']; 
        $address = $row['p_address']; 
        $gender = $row['gender']; 
        echo $d_id . " " . $doctor_name . " " . $age . " ".$allergy . " " .$diagnosis . " " .$address . " " .$gender . "<br>"; 
    }

}




?>
</form>

