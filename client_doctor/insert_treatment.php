

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
    </style>
    
    
    <form action="insertion.php" method="POST" accept-charset="utf-8"> 
        
        <body style = "text-align: center;font-style:italic;background-color: rgb(96, 187, 187);background-image:url('pht.jpg'); background-attachment: fixed;
        background-size: 100% 100%;">
            <br><br><h3 style="color: rgb(6, 123, 248);text-shadow:3px 3px rgb(96, 187, 187);font-weight: 1000;font-size: 40;padding-bottom:0px;">Insert the treatment</h3>
            Since:
        <br><input type="date" id="since" name="since"> 
        
        <br><br>Until:
        <br><input type="date" id="until" name="until"> 
        
       
        
            
            
            <br><br>Doctor ID:
            <br><input type="text" id="d_id" name="d_id"> 
        
            <br><br>Patient ID:
            <br><input type="text" id="p_id" name="p_id"> 
            <br><br>
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

            <br><br>Time In Days:
            <br><input type="text" id="tid" name="tid"> 
        
    
              <br><br><br><input type="submit" value="Submit"> <br> <br><br> <br>
             
        </body>
    
    </form>
    