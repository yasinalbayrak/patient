<!DOCTYPE html>
<html>
<head>
	<title>Hospitals</title>

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
</style>

</head>
<body>

<div align="center">

	<table>

<tr> <th> HOSPITAL ID </th> <th> LOCATION </th><th> BRANCH CODE </th> <th> ADDRESS </th></tr> 

<?php

include "config.php";

$sql_statement = "SELECT * FROM has_branches";

$result = mysqli_query($hospital_db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
    $id = $row['hospital_id'];
    $loc = $row['location']; 
    $bcode = $row['branch_code']; 
    $addr = $row['address']; 
    

    
         

  echo "<tr class='a'>" . "<th>" . $id . "</th>" . "<th>" . $loc . "</th>" . "<th>" . $bcode . "</th>" . "<th>" . $addr ."</th> </tr>" ;
}

?>

</table>
</div>

</body>
</html>