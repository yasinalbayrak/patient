<!DOCTYPE html>
<html>
<head>
	<title>Patients</title>

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

<tr> <th> ID </th> <th> NAME </th><th> AGE </th> <th> <p>ALLERGIC REACTION </p></th> <th>DIAGNOSIS</th><th>LOCATION</th><th>GENDER</th></tr> 

<?php

include "config.php";

$sql_statement = "SELECT * FROM patients";

$result = mysqli_query($hospital_db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
    $id = $row['p_id'];
    $sname = $row['p_name']; 
    $age = $row['age']; 
    $P_allergicreaction = $row['P_allergicreaction']; 
    $p_diagnosis = $row['p_diagnosis']; 
    $p_address = $row['p_address']; 
    $gender = $row['gender'];
    $class = "";
    if($P_allergicreaction == "Yes")
        $class = "class='ayes'";
    else  $class = "class='ano'";
         

  echo "<tr class='a'>" . "<th>" . $id . "</th>" . "<th>" . $sname . "</th>" . "<th>" . $age . "</th>" . "<th> <p ".  $class. " >".$P_allergicreaction . "</p></th>"."<th>". $p_diagnosis . "</th>"."<th>". $p_address. "</th>"."<th>". $gender. "</th>"."</tr>";
}

?>

</table>
</div>

</body>
</html>