<form action="selection.php" method="POST" accept-charset="utf-8" target = "_self" > 
 
    
    <body style = ";font-weight:1000;text-align: center;font-style: italic;background-color: rgb(96, 187, 187);margin-top:100px;background-image:url(pht.jpg);background-size: 100% 100%;background-attachment: fixed">

    <h3 style="color: rgb(6, 123, 248);text-shadow:3px 3px rgb(96, 187, 187);font-weight: 1000;font-size: 40;padding-bottom:0px;"> Filter The Patients</h3>
        
         
        Gender:
        <select name="gender" style = "width: 150px;">
        <option value="3">All</option>
        <option value="1">Male</option>
        <option value="2">Female</option>
        
        </select>

    
    Allergic Reaction: <select name="allergicreaction" style = "width: 150px;">
            <option value="3">All</option>
            <option value="1">Yes</option>
            <option value="2">No</option>
           
            </select>
    <br><br>Address:
        <input type="text" id="address" name="address" style = "width: 150px;"> 
   Diagnosis:
        <input type="text" id="diagnosis" name="diagnosis" style = "width: 150px;"> 

    Min Age : 
        <input type ="text" id = "age_min" name = "age_min" style = "width: 150px;" >    
    Max Age :
        <input type ="text" id = "age_max" name = "age_max"  style = "width: 150px;">    

    
    <br><br> <input type="submit" value="Filter"
                style="background-color:rgb(242, 142, 142);
                border: 2px solid #0a0909;" >
                

    </body>


<?php 

include "config.php"; // Makes mysql connection
if(!empty($_POST))
{
    if (!empty($_POST['address']) )
    {  $address = $_POST['address'];}
    if (!empty($_POST['diagnosis']) )
    {  $diagnosis = $_POST['diagnosis'];}
    
    
    if (!empty($_POST['age_min']) ) $age_min = $_POST['age_min'];
    else  $age_min = 0;
    
    if (!empty($_POST['age_max']) ) $age_max = $_POST['age_max'];
    else  $age_max = 200;
    
    if($_POST['gender'] == 1) $gender = "Man";
    if($_POST['gender'] == 2) $gender = "Woman";
    if($_POST['gender'] == 3) $gender = "All";
    
    if($_POST['allergicreaction'] == 1) $allergicreaction = "Yes";
    if($_POST['allergicreaction'] == 2) $allergicreaction = "No";
    if($_POST['allergicreaction'] == 3) $allergicreaction = "All";
    
    if (!empty($_POST['address']) and (!empty($_POST['diagnosis']) and $allergicreaction != "All" and $gender != "All" )  )
        $sql_statement = "SELECT * FROM patients WHERE gender = '$gender' AND P_allergicreaction = '$allergicreaction' AND p_diagnosis = '$diagnosis'AND age < $age_max AND age > $age_min AND p_address = '$address'";
    else if(empty($_POST['address']) and  (!empty($_POST['diagnosis']) ))
    {
        if($allergicreaction != "All" and $gender != "All")
            $sql_statement = "SELECT * FROM patients WHERE gender = '$gender' AND P_allergicreaction = '$allergicreaction' AND p_diagnosis = '$diagnosis'AND age <= $age_max AND age >= $age_min ";
        else if ($allergicreaction == "All" and $gender != "All")
            $sql_statement = "SELECT * FROM patients WHERE gender = '$gender' AND p_diagnosis = '$diagnosis'AND age <= $age_max AND age >= $age_min ";
        else if($allergicreaction != "All" and $gender == "All")
            $sql_statement = "SELECT * FROM patients WHERE gender = '$gender' AND p_diagnosis = '$diagnosis' AND  P_allergicreaction = '$allergicreaction' AND age <= $age_max AND age >= $age_min ";
        else
            $sql_statement = "SELECT * FROM patients WHERE p_diagnosis = '$diagnosis' AND age <= $age_max AND age >= $age_min ";
            
    }
        
    else if(empty($_POST['diagnosis']) and !empty($_POST['address']))
    {
        if($allergicreaction != "All" and $gender != "All")
            $sql_statement = "SELECT * FROM patients WHERE gender = '$gender' AND P_allergicreaction = '$allergicreaction'AND age <= $age_max AND age >= $age_min AND p_address = '$address'";
        else if ($allergicreaction == "All" and $gender != "All")
            $sql_statement = "SELECT * FROM patients WHERE gender = '$gender' AND age <= $age_max AND age >= $age_min AND p_address = '$address'";
        else if($allergicreaction != "All" and $gender == "All")
            $sql_statement = "SELECT * FROM patients WHERE P_allergicreaction = '$allergicreaction' AND age <= $age_max AND age >= $age_min AND p_address = '$address'";
        else
            $sql_statement = "SELECT * FROM patients WHERE age <= $age_max AND age >= $age_min AND p_address = '$address' ";
    }
    else
    {
        if($allergicreaction != "All" and $gender != "All")
            $sql_statement = "SELECT * FROM patients WHERE gender = '$gender' AND P_allergicreaction = '$allergicreaction'AND age <= $age_max AND age >= $age_min";
        else if ($allergicreaction == "All" and $gender != "All")
            $sql_statement = "SELECT * FROM patients WHERE gender = '$gender' AND age <= $age_max AND age >= $age_min ";
        else if($allergicreaction != "All" and $gender == "All")
            $sql_statement = "SELECT * FROM patients WHERE P_allergicreaction = '$allergicreaction' AND age <= $age_max AND age >= $age_min" ;
        else
            $sql_statement = "SELECT * FROM patients WHERE age <= $age_max AND age >= $age_min ";
    
    }
    #$sql_statement = "SELECT * FROM patients WHERE gender = '$gender' AND P_allergicreaction = '$allergicreaction' AND p_diagnosis = '$diagnosis'AND age < $age_max AND age > $age_min AND p_address = '$address'";
    #echo  $address;
    #     "; 
    #$sql_statement = "SELECT * FROM patients WHERE p_address = '$address'";
    
    $result = mysqli_query($hospital_db, $sql_statement); // Executing query
    
    
    
    if (mysqli_num_rows($result) == 0)
    {
        echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "No patient has been found in that criteria.";
    }
    else  
    {
        echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
    }    

    while($row = mysqli_fetch_assoc($result)) { // Iterating the result
        $patient_id = $row['p_id']; 
        #$patient_name  = iconv('UTF-8', 'ASCII//TRANSLIT', $row['p_name']);
        $patient_name = $row['p_name'];
        $age = $row['age']; 
        $allergy = $row['P_allergicreaction']; 
        $diagnosis = $row['p_diagnosis']; 
        $address = $row['p_address']; 
        $gender = $row['gender']; 
        echo $patient_id . " " . $patient_name . " " . $age . " ".$allergy . " " .$diagnosis . " " .$address . " " .$gender . "<br>"; 
    }

}




?>
</form>

