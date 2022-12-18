<!DOCTYPE html>
<html>
<head>
	<title>Nurse Working In</title>

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

<tr> <th> NURSE ID </th> <th> NURSE NAME </th><th>  BRANCH CODE </th><th> HOSPITAL ID </th> <th> SINCE </th><th> UNTIL </th><th> WORK LOG NUMBER </th></tr> 

<?php

include "config.php";

$sql_statement = "SELECT W.n_id, n_name, branch_code,hospital_id,since,until,workLog_no FROM nurse_worksin W ,nurses N WHERE W.n_id = N.n_id";

$result = mysqli_query($hospital_db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
    $docid = $row['n_id'];
    $docname = $row['n_name']; 
    $bcode = $row['branch_code']; 
    $hospid = $row['hospital_id'];
    $since = $row['since']; 
    $until = $row['until'];  
    $wrk_no = $row['workLog_no'];  
    if($until == "") 
        $until = "<h6>Currently Working</h6>";
         

  echo "<tr class='a'>" . "<th>" . $docid . "</th>" . "<th>" . $docname . "</th>" . "<th>" . $bcode ."</th>" . "<th>" . $hospid ."</th>" . 
  "<th>" . $since ."</th>" . "<th>" . $until ."</th>" . "<th>" . $wrk_no . "</th> </tr>" ;
}

?>

</table>
</div>

</body>
</html>