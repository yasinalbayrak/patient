<!DOCTYPE html>
<html>
<head>
	<title>Doctors</title>

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
.ayes{
    align: center;
    border-radius: 0.2rem;
    background:#c8e6c9 ;/* green */
    padding: 0.2rem 1rem;
    text-align: center;
    color:#388e3c;
    
}
.ano{
    align: center;
    border-radius: 0.2rem;
    background: #ffcdd2;
    padding: 0.2rem 1rem;
    text-align: center;
    color:#c62828;

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
</style>

</head>
<body>

<div align="center">

	<table>

<tr> <th> ID </th> <th> NAME </th><th> AGE </th> <th> ANNUAL SALARY ($)</th><th>ADDRESS</th><th>GENDER</th><th>SPECIALIZATION</th></tr> 

<?php

include "config.php";

$sql_statement = "SELECT * FROM doctors";

$result = mysqli_query($hospital_db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
    $d_id = $row['d_id'];
    $d_name = $row['d_name']; 
    $d_age = $row['age']; 
    $d_salary = $row['d_salary']; 
    $d_address = $row['d_address']; 
    $d_gender = $row['gender'];
    $specialization= $row['specialization'];
         

  echo "<tr class='a'>" . "<th>" . $d_id . "</th>" . "<th>" . $d_name . "</th>" . "<th>" . $d_age . "</th>" ."<th>".$d_salary."</th>"."<th>". $d_address. "</th>"."<th>". $d_gender. "</th>"."<th>". $specialization. "</th>"."</tr>";
}


?>

</table>
</div>

</body>
</html>