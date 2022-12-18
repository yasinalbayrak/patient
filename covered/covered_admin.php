<!DOCTYPE html>
<html>
<head>
	<title>Covering Policy</title>


<style>
    
    input[type=submit] {
      width: 100px;
      background-color: rgb(96, 187, 187);
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      
      border: 2px solid #0a0909;
    }
    
    input[type=submit]:hover {
      background-color: #745df5;
    }
    
    .container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 30vh;
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
    h1{
        text-align: center;
        font-style:italic;
        
    }
    body{
        background-color: rgb(96, 187, 187);
        background-image:url('pht.jpg');
        background-attachment: fixed;
        background-size: 100% 100%;
        text-align: center;
    }

</style>
</head>   
<body>    
    <form action="deletion_c.php" method="POST" accept-charset="utf-8"> 
        
        <h1>
            <br><br><h3 style="color: rgb(6, 123, 248);text-shadow:3px 3px rgb(96, 187, 187);font-weight: 1000;font-size: 40px;padding-bottom:0px;">Delete a Work Info</h3>
            <?php 
            include "covers.php";
            ?>
            <br><br><br>
            Select the covering log number to be deleted
            <select name="covering_log_num">

            <?php
            
            include "config.php";
            
            $sql_command = "SELECT DISTINCT(covering_log_num) FROM covered_by";
            
            $myresult = mysqli_query($hospital_db, $sql_command);
            echo "<option value='' disabled selected hidden> Select an id </option>";
            while($id_rows = mysqli_fetch_assoc($myresult))
            {
                $id = $id_rows['covering_log_num'];
                echo "<option value=$id>".$id."</option>";
            }
            
            ?>
           
        
        
       
        
            
            
    
        
        
          
    
              <br><br><br><input type="submit" value="Submit"> <br> <br><br> <br>
        </h1>      
        
        <div class="container">
      <a href="index_covered.php" class="btn">Go back to main page</a>
    </div>
    </form>
</body>
</html>
    