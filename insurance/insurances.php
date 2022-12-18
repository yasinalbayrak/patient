<!DOCTYPE html>
<html>
<head>
	<title>Insurances</title>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 70%;
  
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

<div align="center">

	<table>

<tr> <th> Policy ID </th> <th> INSURANCE TYPE </th><th>  INSURANCE COMPANY </th></tr> 

<?php

include "config.php";

$sql_statement = "SELECT * FROM insurance" ;

$result = mysqli_query($hospital_db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
    $pid = $row['policy_id'];
    $type = $row['Ins_type']; 
    $comp = $row['Ins_company']; 


  echo "<tr class='a'>" . "<th>" . $pid . "</th>" . "<th>" . $type . "</th>" . 
  "<th>" . $comp . "</th> </tr>" ;
}

?>

</table>
</div>

</body>
</html>