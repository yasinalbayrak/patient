<!DOCTYPE html>
<html>
<head>
	<title>Hospital Deletion</title>

<style>
button{
    background-color:white;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

button a{
  display: inherit;
  width: 200px;
  height: 40px;
  line-height: 40px;
  font-size: 18px;
  font-family: sans-serif;
  text-decoration: none;
  color: #333;
  border: 1px solid #333;
  letter-spacing: 2px;
  text-align: center;
  position: relative;
  transition: all .35s;
}
button a span{
  position: relative;
  z-index: 2;
}
button a:after{
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 0;
  height: 100%;
  background: #ff003b;
  transition: all .35s;
}

button a:hover{
  color: #fff;
}

button a:hover:after{
  width: 100%;
}
/* Other styles*/




body{
    text-align: center;
    background-image:url('pht.jpg'); 
    background-attachment: fixed;
    background-size: 100% 100%;
}

















.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
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
<?php 

include "config.php";

include "hospitals.php";

?>
<p3>
<form action="delete_hospital.php" method="POST">




<select name="ids" >

<?php

$sql_command = "SELECT hospital_id FROM hospitals";

$myresult = mysqli_query($hospital_db, $sql_command);
echo "<option value='' disabled selected hidden> Select an id </option>";
while($id_rows = mysqli_fetch_assoc($myresult))
{
	$id = $id_rows['hospital_id'];
	echo "<option value=$id>".$id."</option>";
}

?>
</select>


<button> <a><span>DELETE</span></a></button>
<div class="container">
      <a href="hospitals_index.php" class="btn">Go back to main page</a>
    </div>


</form>
</p3>
</body>
</html>
