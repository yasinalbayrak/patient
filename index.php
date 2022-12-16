

<!DOCTYPE html>
<html>
<head>
	<title>MAIN PAGE</title>

<style>

    
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
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

.button2 {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  } /* Blue */

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  background-image:url('pht.jpg');
  padding: 8px;
  background-attachment: fixed;
  background-size: 100% 100%;
  
}
body{
    margin:0px;
    
}
b{
    color: rgb(105, 0, 166);
    font-weight: 500px;
    font-size: 50px;
    padding-bottom:0px;
    
}

</style>


</head>
<body >
    
    
<div align="center">
<b>Welcome to the Hospital Database</b>
<br>
<br>
<b>
Here is the patients in our database: 
</b>
<br>
<br>

<?php 
include "patients.php";
?>



</div>
</body>
</html>
