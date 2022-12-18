<!DOCTYPE html>
<html>
<head>
	<title>Treatment</title>

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
</style>

</head>
<body>
<form action="select_treatment.php" method="POST" accept-charset="utf-8" target = "_self" style="align=center" > 
 
    
    
    <h5> Filter The Treatments</h5>
        
         
        

    
    
    <h4>
   Since:
        <input type="text" id="since" name="since" style = "width: 150px;"> 
    Until: 
        <input type ="text" id = "until" name = "until" style = "width: 150px;" >    
    Doctor ID: 
        <input type ="text" id = "d_id" name = "d_id" style = "width: 150px;" >
    
    Patient ID: 
        <input type ="text" id = "p_id" name = "p_id" style = "width: 150px;" >
    </h4>
 
    <br><br> <input type="submit" value="Filter"
                style="background-color:rgb(242, 142, 142);
                border: 2px solid #0a0909;" >
    


</form>
<div align="center">

	<table>

<tr> <th> SINCE </th> <th> UNTIL </th><th> DOCTOR ID </th> <th> PATIENT ID </th></tr> 
<?php

include "config.php";
if(!empty($_POST))
{
    if (!empty($_POST['since']) )
    {  $since = $_POST['since'];}
    if (!empty($_POST['until']) )
    {  $until = $_POST['until'];}
    if (!empty($_POST['d_id']) )
    {  $d_id = $_POST['d_id'];}
    if (!empty($_POST['p_id']) )
    {  $p_id = $_POST['p_id'];}
    
    if(!empty($_POST['since']) and !empty($_POST['until']) )
    {
        if(!empty($_POST['d_id']) and !empty($_POST['p_id']) )
            $sql_statement = "SELECT * FROM treats WHERE since = '$since' AND until = '$until' AND p_id = '$p_id' AND d_id = '$d_id'";
        else if(!empty($_POST['d_id']) and empty($_POST['p_id']) )
            $sql_statement = "SELECT * FROM treats WHERE since = '$since' AND until = '$until' AND d_id = '$d_id'";
        else if(empty($_POST['d_id']) and !empty($_POST['p_id']) )
            $sql_statement = "SELECT * FROM treats WHERE since = '$since' AND until = '$until'AND p_id = '$p_id' ";
        else if(empty($_POST['d_id']) and empty($_POST['p_id']) )
            $sql_statement = "SELECT * FROM treats WHERE since = '$since' AND until = '$until'";
    }
         
    else if (empty($_POST['until']) and !empty($_POST['since']) )
    {
        if(!empty($_POST['d_id']) and !empty($_POST['p_id']) )
            $sql_statement = "SELECT * FROM treats WHERE since = '$since'  AND p_id = '$p_id' AND d_id = '$d_id'";
        else if(!empty($_POST['d_id']) and empty($_POST['p_id']) )
            $sql_statement = "SELECT * FROM treats WHERE since = '$since'  AND d_id = '$d_id'";
        else if(empty($_POST['d_id']) and !empty($_POST['p_id']) )
            $sql_statement = "SELECT * FROM treats WHERE since = '$since' AND p_id = '$p_id' ";
        else if(empty($_POST['d_id']) and empty($_POST['p_id']) )
            $sql_statement = "SELECT * FROM treats WHERE since = '$since'";
    }
        
    else if (!empty($_POST['until']) and empty($_POST['since']) )
    {
        if(!empty($_POST['d_id']) and !empty($_POST['p_id']) )
            $sql_statement = "SELECT * FROM treats WHERE until = '$until'  AND p_id = '$p_id' AND d_id = '$d_id'";
        else if(!empty($_POST['d_id']) and empty($_POST['p_id']) )
            $sql_statement = "SELECT * FROM treats WHERE until = '$until'  AND d_id = '$d_id'";
        else if(empty($_POST['d_id']) and !empty($_POST['p_id']) )
            $sql_statement = "SELECT * FROM treats WHERE until = '$until' AND p_id = '$p_id' ";
        else if(empty($_POST['d_id']) and empty($_POST['p_id']) )
            $sql_statement = "SELECT * FROM treats WHERE until = '$until'";
    }
        
    else if ((empty($_POST['until']) and empty($_POST['since']) ))
    {
        if(!empty($_POST['d_id']) and !empty($_POST['p_id']) )
            $sql_statement = "SELECT * FROM treats WHERE  p_id = '$p_id' AND d_id = '$d_id'";
        else if(!empty($_POST['d_id']) and empty($_POST['p_id']) )
            $sql_statement = "SELECT * FROM treats WHERE  d_id = '$d_id'";
        else if(empty($_POST['d_id']) and !empty($_POST['p_id']) )
            $sql_statement = "SELECT * FROM treats WHERE  p_id = '$p_id' ";
        else if(empty($_POST['d_id']) and empty($_POST['p_id']) )
            $sql_statement = "SELECT * FROM treats ";
    }

    $result = mysqli_query($hospital_db, $sql_statement);
    if (mysqli_num_rows($result) == 0)
    {
        echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "No treatment has been found in that criteria.";
    }
    else  
    {
        echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:"."</h3>";
    }    
    while($row = mysqli_fetch_assoc($result))
    {
        $since = $row['since'];
        $until = $row['until']; 
        $d_id = $row['d_id']; 
        $p_id = $row['p_id']; 
    
        
             
    
      echo "<tr class='a'>" . "<th>" . $since . "</th>" . "<th>" . $until . "</th>" . "<th>" . $d_id . "</th>"."<th>" . $p_id . "</th> </tr>" ;
    }
}       




?>

</table>

<div class="container">
      <a href="index_treats.php" class="btn">Go back to main page</a>
    </div>

</div>

</body>
</html>