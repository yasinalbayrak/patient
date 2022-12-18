<!DOCTYPE html>
<html>
<head>
	<title>Work Info</title>

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
<form action="workinfo_selection.php" method="POST" accept-charset="utf-8" target = "_self" style="align=center" > 
 
    
    
    <h5> Filter The Work Info</h5>
        
         
        

    
    
    <h4>
    MIN NURSE ID:
        <input type="text" id="MINd_id" name="MINd_id" style = "width: 150px;"> 
    MAX NURSE ID:
        <input type="text" id="MAXd_id" name="MAXd_id" style = "width: 150px;"> 
    
    MIN Hospital ID:
        <input type="text" id="MINhospital_id" name="MINhospital_id" style = "width: 150px;"> 
    MAX Hospital ID:
        <input type="text" id="MAXhospital_id" name="MAXhospital_id" style = "width: 150px;"> 
      
    <br><br>
    SINCE: 
        <input type ="date" id = "since" name = "since" style = "width: 150px;" >    
    UNTIL:
        <input type ="date" id = "until" name = "until"  style = "width: 150px;">    
    MIN BRANCH CODE:
        <input type ="text" id = "min_bcode" name = "min_bcode"  style = "width: 150px;">    
    MAX BRANCH CODE:
        <input type ="text" id = "max_bcode" name = "max_bcode"  style = "width: 150px;">    
    
    
      </h4>
 
    <br><br> <input type="submit" value="Filter"
                style="background-color:rgb(242, 142, 142);
                border: 2px solid #0a0909;" >
    


</form>
<div align="center">

	<table>

<tr> <th> NURSE ID </th> <th>  BRANCH CODE </th><th> HOSPITAL ID </th> <th> SINCE </th><th> UNTIL </th><th> WORK LOG NUMBER </th></tr> 
<?php

include "config.php";
if(!empty($_POST))
{

    
    if (!empty($_POST['since']) ) $since = date('Y-m-d', strtotime($_POST['since']));
    else  $since = date('0000-00-00');
    
    if (!empty($_POST['until']) ) $until = date('Y-m-d', strtotime($_POST['until']));
    else  $until = date('2100-01-01');

    if (!empty($_POST['MINd_id']) ) $MINd_id = $_POST['MINd_id'];
    else  $MINd_id = 0;
    
    if (!empty($_POST['MAXd_id']) ) $MAXd_id = $_POST['MAXd_id'];
    else  $MAXd_id = PHP_INT_MAX;



    if (!empty($_POST['MINhospital_id']) ) $MINhospital_id = $_POST['MINhospital_id'];
    else  $MINhospital_id = 0;
    
    if (!empty($_POST['MAXhospital_id']) ) $MAXhospital_id = $_POST['MAXhospital_id'];
    else  $MAXhospital_id = PHP_INT_MAX;
    
    if (!empty($_POST['MINbranch_code']) ) $MINbranch_code = $_POST['MINbranch_code'];
    else  $MINbranch_code = 0;
    
    if (!empty($_POST['MAXbranch_code']) ) $MAXbranch_code = $_POST['MAXbranch_code'];
    else  $MAXbranch_code = PHP_INT_MAX;
     /*if((string)$since <= (string)$until)
     {
        $bool = "i can found";
     }
     else
     {
        $bool = "sictik";
     }

    echo $bool;*/
    $since = date('Y-m-d', strtotime($_POST['since']));
    if(empty($_POST['until']))
        $until = date('2100-12-12');

    
    
    $sql_statement = "SELECT * FROM nurse_worksin WHERE 
        since >= '$since'
        AND until <= '$until'


        AND n_id <= $MAXd_id 
        AND n_id >= $MINd_id
        AND hospital_id <= $MAXhospital_id 
        AND hospital_id >= $MINhospital_id
        AND branch_code <= $MAXbranch_code
        AND branch_code >= $MINbranch_code";
    if(empty($_POST['until']) )
        $sql_statement = "SELECT * FROM nurse_worksin WHERE 
        since >= '$since'
        AND until <= '$until'


        AND n_id <= $MAXd_id 
        AND n_id >= $MINd_id
        AND hospital_id <= $MAXhospital_id 
        AND hospital_id >= $MINhospital_id
        AND branch_code <= $MAXbranch_code
        AND branch_code >= $MINbranch_code 

        UNION

        SELECT * FROM nurse_worksin WHERE 
        since >= '$since'
        AND ISNULL(until) 


        AND n_id <= $MAXd_id 
        AND n_id >= $MINd_id
        AND hospital_id <= $MAXhospital_id 
        AND hospital_id >= $MINhospital_id
        AND branch_code <= $MAXbranch_code
        AND branch_code >= $MINbranch_code  ";
    
 
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
    while($row = mysqli_fetch_assoc($result))
    {
        $docid = $row['n_id'];
        
        $bcode = $row['branch_code']; 
        $hospid = $row['hospital_id'];
        $since = $row['since']; 
        $until = $row['until'];  
        $wrk_no = $row['workLog_no'];  
        if($until == "") 
          $until = "<h6>Currently Working</h6>";
        
             
    
        echo "<tr class='a'>" . "<th>" . $docid . "</th>" .  "<th>" . $bcode ."</th>" . "<th>" . $hospid ."</th>" . 
        "<th>" . $since ."</th>" . "<th>" . $until ."</th>" . "<th>" . $wrk_no . "</th> </tr>" ;
      }
}       




?>

</table>

<div class="container">
      <a href="index_nurses_worksin.php" class="btn">Go back to main page</a>
    </div>

</div>

</body>
</html>