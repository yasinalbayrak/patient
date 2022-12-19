

<!DOCTYPE html>
<html>
<head>
	<title>Patient</title>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
  
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  
  
}
p{
   text-align:center;
   padding: 8px;
   border-radius: 5px;
  
    
}
tr:nth-child(even) {
  background-color: #dddddd;
  background-color: #e4e4e4;
  background-color: #efecec;
  background-color:#82C3EC;
  background-color: #e4e4e4;
  background-color: #efecec;
}
tr:nth-child(odd) {
  background-color: white;
  
}
tr:nth-child(1) {
  background-color: #76a5af;
  background-color: rgb(105, 0, 166);
  color: #82C3EC;
  font: weight 500px;
  font-style: italic;
}
tr.a:hover{
  background-color: coral;
}
body{
    text-align:center;
    background-image:url(pht.jpg);background-size: 100% 100%;background-attachment: fixed;
}
h5{
    padding:30px;
    color: rgb(6, 123, 248);
    text-shadow:3px 3px rgb(96, 187, 187);
    font-weight: 1000;
    font-size: 50px;
    padding-bottom:0px;
}
h4{
    color: rgb(6, 123, 248);
    font-weight:2000;
    padding:10px;
}
input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 50vh;
}

.container a {
  font-size: 1.5rem;
  padding: 1rem 3rem;
  color: #f4f4f4;
  text-transform: uppercase;
}

.btn {
  text-decoration: none;
  border: 1px solid rgb(146, 148, 248);
  position: relative;
  overflow: hidden;
}

.btn:hover {
  box-shadow: 1px 1px 25px 10px rgba(146, 148, 248, 0.4);
}

.btn:before {
  content: "";
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(
    120deg,
    transparent,
    rgba(146, 148, 248, 0.4),
    transparent
  );
  transition: all 650ms;
}

.btn:hover:before {
  left: 100%;
}
h6{
    padding: 0px;
    margin: 0px;
    background-color: white;
    color: red;
    font-size:19px;
}
</style>

</head>
<body>
<form action="selection.php" method="POST" accept-charset="utf-8" target = "_self" style="align=center" > 
 
    
    
    <h5> Filter The Patients</h5>
        
         
        

    
    
    <h4>

    GENDER:
        <select name="gender" style = "width: 150px;">
        <option value="3">All</option>
        <option value="1">Male</option>
        <option value="2">Female</option>
        
        </select>

    
    ALLERGIC REACTION: <select name="allergicreaction" style = "width: 150px;">
            <option value="3">All</option>
            <option value="1">Yes</option>
            <option value="2">No</option>
           
            </select>
    <br><br>ADDRESS:
        <input type="text" id="address" name="address" style = "width: 150px;"> 
   DIAGNOSIS:
        <input type="text" id="diagnosis" name="diagnosis" style = "width: 150px;"> 

    MIN AGE : 
        <input type ="text" id = "age_min" name = "age_min" style = "width: 150px;" >    
    MAX AGE :
        <input type ="text" id = "age_max" name = "age_max"  style = "width: 150px;">    

    
    
      </h4>
 
    <br><br> <input type="submit" value="Filter"
                style="background-color:rgb(242, 142, 142);
                border: 2px solid #0a0909;" >
    


</form>
<div align="center">

	<table>


<tr> <th> PATIENT NAME </th><th> PATIENT ID </th> <th> AGE</th><th> ALLERGIC REACTION </th><th> DIAGNOSIS </th><th> ADDRESS </th><th> GENDER </th></tr> 
<?php

include "config.php";
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
        
    
    
 
    $result = mysqli_query($hospital_db, $sql_statement);
    if (mysqli_num_rows($result) == 0)
    {
        echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "No patient has been found in that criteria.";
    }
    else  
    {
        echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:"."</h3>";
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
        echo "<tr class='a'>" . "<th>" . $patient_name . "</th>"  . "<th>" . $patient_id ."</th>" . "<th>" . $age . "</th>". "<th>" . $allergy . "</th>". "<th>" . $diagnosis . "</th>" . "<th>" . $address . "</th>"."<th>" . $gender . "</th>". "</tr>" ;          
    }
}       


?>

</table>

<div class="container">
      <a href="index.php" class="btn">Go back to main page</a>
    </div>

</div>

</body>
</html>