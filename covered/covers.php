<!DOCTYPE html>
<html>
<head>
	<title>Covering</title>

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

<tr> <th> Covering Log Number</th>  <th> POLICY ID </th><th> PATIENT ID </th><th> PATIENT NAME </th><th> END DATE  </th></tr> 

<?php

include "config.php";

$sql_statement = "SELECT C.p_id, R.p_name, policy_id,end_date, covering_log_num FROM patients R ,covered_by C WHERE R.p_id = C.p_id";

$result = mysqli_query($hospital_db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
    $docid = $row['p_id'];
    $docname = $row['p_name']; 
    $bcode = $row['policy_id']; 
    $hospid = $row['end_date'];
    $since = $row['covering_log_num']; 
 

         

  echo "<tr class='a'>" . "<th>" . $since . "</th>" . "<th>" . $docid . "</th>" . "<th>" . $bcode ."</th>" . "<th>" . $docname ."</th>" . 
  "<th>" . $hospid . "</th> </tr>" ;
}

?>

</table>
</h3>

</body>
</html>