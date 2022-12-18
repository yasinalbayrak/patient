<!DOCTYPE html>
<html>
<head>
	<title>Insert Prescribed Info</title>


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
    
    .btn{
        width: 100px;
      background-color: rgb(255, 93, 193);
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      
      border: 2px solid #0a0909;
       
        
    }
    .container{
        text-align: center;
        align-items: center;
        height: 50px;
    }
    .btn:hover{
        background-color: #745df5;
    }
    
    .btn a{
        text-align: center;
        text-decoration: none;
        
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
    <form action="insertion_p.php" method="POST" accept-charset="utf-8"> 
        
        <h1>
            <br><br><h3 style="color: rgb(6, 123, 248);text-shadow:3px 3px rgb(96, 187, 187);font-weight: 1000;font-size: 40px;padding-bottom:0px;">
            Insert a Prescribed Info</h3>
            
            <br><br><br>
            Select the patient 

            <select name="p_id">

            <?php
            
            include "config.php";
            
            $sql_command = "SELECT DISTINCT(p_id) FROM patients";
            
            $myresult = mysqli_query($hospital_db, $sql_command);
            echo "<option value='' disabled selected hidden> Select an id </option>";
            while($id_rows = mysqli_fetch_assoc($myresult))
            {
                $id = $id_rows['p_id'];
                echo "<option value=$id>".$id."</option>";
            }
            
            ?>
            </select>

            
            <br><br><br>
            Select the medicine 
            <select name="med_id">

            <?php
            
            include "config.php";
            
            $sql_command = "SELECT DISTINCT(m_code) FROM prescribed";
            
            $myresult = mysqli_query($hospital_db, $sql_command);
            echo "<option value='' disabled selected hidden> Select an id </option>";
            while($id_rows = mysqli_fetch_assoc($myresult))
            {
                $id = $id_rows['m_code'];
                echo "<option value=$id>".$id."</option>";
            }
            



            ?>
            </select>


            <br>



            
            <br><br>  
            <label for="tid">Time In Days:</label>
            <input type="input" id="tid" name="tid" placeholder= "Enter a number">
            
  
        
       
        
            
            
    
        
        
          
    
              <br><br><br><input type="submit" value="Submit"> <br> <br><br> <br>
        </h1>      
        
    
    </form>
</body>
</html>
    