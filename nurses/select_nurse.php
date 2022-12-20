<!DOCTYPE html>
<html>
<head>
	<title>Nurse</title>

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
    background-image:url(nurse.jpg);background-size: 100% 100%;background-attachment: fixed;
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
<form action="select_nurse.php" method="POST" accept-charset="utf-8" target = "_self" style="align=center" > 
 
    
    
    <h5> Filter The Nurses</h5>
        
         
        

    
    
    <h4>

    NURSE NAME:
        <input type ="text" id = "n_name" name = "n_name"  style = "width: 150px;">
    MIN SALARY:
        <input type="text" id="Min_salary" name="Min_salary" style = "width: 150px;"> 
    MAX SALARY:
        <input type="text" id="Max_salary" name="Max_salary" style = "width: 150px;"> 
    
    MIN AGE:
        <input type="text" id="Min_age" name="Min_age" style = "width: 150px;"> 
    MAX AGE:
        <input type="text" id="Max_age" name="Max_age" style = "width: 150px;"> 
    <br>
    ADDRESS:
        <input type ="text" id = "n_address" name = "n_address"  style = "width: 150px;">    
    

    GENDER:
    <select name="gender" style = "width: 150px;">
    <option value="3">All</option>
    <option value="1">Male</option>
    <option value="2">Female</option>  
    </select>

      
    
    
      </h4>
 
    <br><br> <input type="submit" value="Filter"
                style="background-color:rgb(242, 142, 142);
                border: 2px solid #0a0909;" >
    


</form>
<div align="center">

	<table>


<tr> <th> NURSE ID </th> <th> ANNUAL SALARY ($)</th><th> NURSE NAME </th><th> AGE </th><th> ADDRESS </th><th> GENDER </th></tr> 
<?php

include "config.php";
if(!empty($_POST))
{

    
    if (!empty($_POST['Min_salary']) ) $Min_salary =$_POST['Min_salary'];
    else  $Min_salary = 0;
    if (!empty($_POST['Max_salary']) ) $Max_salary =$_POST['Max_salary'];
    else  $Max_salary = PHP_INT_MAX;
    if (!empty($_POST['Min_age']) ) $Min_age =$_POST['Min_age'];
    else  $Min_age = 0;
    if (!empty($_POST['Max_age']) ) $Max_age =$_POST['Max_age'];
    else  $Max_age = PHP_INT_MAX;
    if (!empty($_POST['n_name']) ) $n_name = $_POST['n_name'];
    
    
    if (!empty($_POST['n_address']) ) $n_address = $_POST['n_address'];
    if($_POST['gender'] == 1) $gender = "Man";
    if($_POST['gender'] == 2) $gender = "Woman";
    if($_POST['gender'] == 3) $gender = "All";
    



    if( !empty($_POST['n_name']) )
    {
        if(!empty($_POST['n_address']) and $gender != "All" )
            $sql_statement = "SELECT * FROM nurses WHERE  n_name = '$n_name' AND gender = '$gender' AND n_address = '$n_address'AND age <= $Max_age AND age >= $Min_age AND n_salary <= $Max_salary AND n_salary >= $Min_salary";
        else if(!empty($_POST['n_address']) and $gender = "All" )
            $sql_statement = "SELECT * FROM nurses WHERE  n_name = '$n_name' AND n_address = '$n_address'AND age <= $Max_age AND age >= $Min_age AND n_salary <= $Max_salary AND n_salary >= $Min_salary";
        else if(empty($_POST['n_address']) and $gender != "All" )
            $sql_statement = "SELECT * FROM nurses WHERE   n_name = '$n_name'AND gender = '$gender'AND  age <= $Max_age AND age >= $Min_age AND n_salary <= $Max_salary AND n_salary >= $Min_salary";
        else if(empty($_POST['n_address']) and $gender = "All" )
            $sql_statement = "SELECT * FROM nurses WHERE   n_name = '$n_name'AND age <= $Max_age AND age >= $Min_age AND n_salary <= $Max_salary AND n_salary >= $Min_salary";
    }
         
    else if (empty($_POST['n_name']) )
    {
        if(!empty($_POST['n_address']) and $gender != "All" )
            $sql_statement = "SELECT * FROM nurses WHERE  gender = '$gender' AND n_address = '$n_address'AND age <= $Max_age AND age >= $Min_age AND n_salary <= $Max_salary AND n_salary >= $Min_salary";
        else if(!empty($_POST['n_address']) and $gender = "All" )
            $sql_statement = "SELECT * FROM nurses WHERE  n_address = '$n_address'AND age <= $Max_age AND age >= $Min_age AND n_salary <= $Max_salary AND n_salary >= $Min_salary";
        else if(empty($_POST['n_address']) and $gender != "All" )
            $sql_statement = "SELECT * FROM nurses WHERE  gender = '$gender' AND age <= $Max_age AND age >= $Min_age AND n_salary <= $Max_salary AND n_salary >= $Min_salary ";
        else if(empty($_POST['n_address']) and $gender = "All" )
            $sql_statement = "SELECT * FROM nurses WHERE age <= $Max_age AND age >= $Min_age AND n_salary <= $Max_salary AND n_salary >= $Min_salary";
    }
        
    
    
 
    $result = mysqli_query($hospital_db, $sql_statement);
    if (mysqli_num_rows($result) == 0)
    {
        echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "No nurse has been found in that criteria.";
    }
    else  
    {
        echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:"."</h3>";
    }    
    while($row = mysqli_fetch_assoc($result)){
        $n_id = $row['n_id'];
        $salary = $row['n_salary']; 
        $n_name = $row['n_name'];
        $age = $row['age'];
        $n_address = $row['n_address'];
        $gender = $row['gender'];
        
        echo "<tr class='a'>" . "<th>" . $n_id . "</th>"  . "<th>" . $salary ."</th>" . "<th>" . $n_name . "</th>". "<th>" . $age . "</th>". "<th>" . $n_address . "</th>" . "<th>" . $gender . "</th>". "</tr>" ;          
    }
}       




?>

</table>

<div class="container">
      <a href="index_nurses.php" class="btn">Go back to main page</a>
    </div>

</div>

</body>
</html>