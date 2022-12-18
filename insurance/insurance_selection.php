<!DOCTYPE html>
<html>
<head>
	<title>Insurance</title>

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
    background-image:url(ins.jpg);background-size: 100% 100%;background-attachment: fixed;
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
<form action="insurance_selection.php" method="POST" accept-charset="utf-8" target = "_self" style="align=center" > 
 
    
    
    <h5> Filter The Insurances</h5>
        
         
        

    
    
    <h4>
    MIN POLICY ID:
        <input type="text" id="MINp_id" name="MINp_id" style = "width: 150px;"> 
    MAX POLICY ID:
        <input type="text" id="MAXp_id" name="MAXp_id" style = "width: 150px;"> 
    

    
    Insurance type:
        <input type ="text" id = "Ins_type" name = "Ins_type"  style = "width: 150px;">    
    

    Insurance company:
        <input type ="text" id = "Ins_company" name = "Ins_company"  style = "width: 150px;">    
    
    
      </h4>
 
    <br><br> <input type="submit" value="Filter"
                style="background-color:rgb(242, 142, 142);
                border: 2px solid #0a0909;" >
    


</form>
<div align="center">

	<table>


<tr> <th> POLICY ID </th> <th> INSURANCE TYPE </th><th> INSURANCE COMPANY </th></tr> 
<?php

include "config.php";
if(!empty($_POST))
{

    
    if (!empty($_POST['MINp_id']) ) $MINp_id =$_POST['MINp_id'];
    else  $MINp_id = 0;
    if (!empty($_POST['MAXp_id']) ) $MAXp_id =$_POST['MAXp_id'];
    else  $MAXp_id = PHP_INT_MAX;

    if (!empty($_POST['Ins_type']) ) $Ins_type = $_POST['Ins_type'];
    
    
    if (!empty($_POST['Ins_company']) ) $Ins_company = $_POST['Ins_company'];
    



    
    if(!empty($_POST['Ins_type']) AND !empty($_POST['Ins_company']) )
        $sql_statement = "SELECT * FROM insurance 
        WHERE Ins_company = '$Ins_company' AND Ins_type = '$Ins_type'
        AND policy_id <= $MAXp_id 
        AND policy_id >= $MINp_id
        ";
    else if(!empty($_POST['Ins_type'])) 
    {
      $sql_statement = "SELECT * FROM insurance WHERE Ins_type = '$Ins_type'
       AND policy_id <= $MAXp_id 
       AND policy_id >= $MINp_id";
    }
    else if (!empty($_POST['Ins_company']))
    {
      $sql_statement = "SELECT * FROM insurance WHERE Ins_company = '$Ins_company'
      AND policy_id <= $MAXp_id 
       AND policy_id >= $MINp_id";
    }
    else{ // both blank
      $sql_statement = "SELECT * FROM insurance WHERE  
      policy_id <= $MAXp_id 
       AND policy_id >= $MINp_id";
    }
 
    $result = mysqli_query($hospital_db, $sql_statement);
    if (mysqli_num_rows($result) == 0)
    {
        echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "No work info has been found in that criteria.";
    }
    else  
    {
        echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:"."</h3>";
    }    
    while($row = mysqli_fetch_assoc($result)){
        $docid = $row['policy_id'];
        
        $bcode = $row['Ins_type']; 
        $hospid = $row['Ins_company'];
       
    
        echo "<tr class='a'>" . "<th>" . $docid . "</th>"  . "<th>" . $bcode ."</th>" . "<th>" . $hospid . "</th> </tr>" ;          
    }
}       




?>

</table>

<div class="container">
      <a href="index_insurance.php" class="btn">Go back to main page</a>
    </div>

</div>

</body>
</html>