

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
    
    
    <form action="insert_doc.php" method="POST" accept-charset="utf-8"> 
        
        <body style = "text-align: center;font-style:italic;background-color: rgb(96, 187, 187);background-image:url('pht.jpg'); background-attachment: fixed;
        background-size: 100% 100%;">
            <br><br><h3 style="color: rgb(6, 123, 248);text-shadow:3px 3px rgb(96, 187, 187);font-weight: 1000;font-size: 40;padding-bottom:0px;">Change Your Job</h3>

            <br><br>Your Doctor ID:
            <br><input type="text" id="d_id" name="d_id"> 
            <br><br>
            Select the old hospital id
            <select name="hospital_id">

            <?php
            
            include "config.php";
            
            $sql_command = "SELECT DISTINCT(hospital_id) FROM hospitals";
            
            $myresult = mysqli_query($hospital_db, $sql_command);
            echo "<option value='' disabled selected hidden> Select an id </option>";
            while($id_rows = mysqli_fetch_assoc($myresult))
            {
                $id = $id_rows['hospital_id'];
                echo "<option value=$id>".$id."</option>";
            }
            
            ?>
</select>

            Select the old branch code
            <select name="branch_code">

            <?php
            
            include "config.php";
            
            $sql_command = "SELECT DISTINCT(branch_code) FROM has_branches";
            
            $myresult = mysqli_query($hospital_db, $sql_command);
            echo "<option value='' disabled selected hidden> Select an id </option>";
            while($id_rows = mysqli_fetch_assoc($myresult))
            {
                $id = $id_rows['branch_code'];
                echo "<option value=$id>".$id."</option>";
            }
            
            ?>
</select>

<br><br>

Select the new hospital id 
            <select name="hospital_idnew">

            <?php
            
            include "config.php";
            
            $sql_command = "SELECT DISTINCT(hospital_id) FROM hospitals";
            
            $myresult = mysqli_query($hospital_db, $sql_command);
            echo "<option value='' disabled selected hidden> Select an id </option>";
            while($id_rows = mysqli_fetch_assoc($myresult))
            {
                $id = $id_rows['hospital_id'];
                echo "<option value=$id>".$id."</option>";
            }
            
            ?>
</select>



          
            Select the new branch code

            <select name="branch_codenew">

            <?php
            
            include "config.php";
            $hospital_id = $_POST['hospital_id'];
            $sql_command = "SELECT branch_code FROM has_branches WHERE hospital_id = $hospital_id";
            
            $myresult = mysqli_query($hospital_db, $sql_command);
            echo "<option value='' disabled selected hidden> Select an id </option>";
            while($id_rows2 = mysqli_fetch_assoc($myresult))
            {
                $id2 = $id_rows2['branch_code'];
                echo "<option value=$id2>".$id2."</option>";
            }
            
            ?>



            </select>

            <br><br>Starting Date:
            <br><input type="date" id="date" name="date"> 
    
              <br><br><br><input type="submit" value="Submit"> <br> <br><br> <br>
             
        </body>
    
    </form>
    