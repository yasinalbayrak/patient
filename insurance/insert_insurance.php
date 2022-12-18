<!DOCTYPE html>
<html>
<head>
	<title>Insert Work Info</title>


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
        background-image:url('ins.jpg');
        background-attachment: fixed;
        background-size: 100% 100%;
        text-align: center;
    }
</style>
</head>   
<body>    
    <form action="insertion_i.php" method="POST" accept-charset="utf-8"> 
        
        <h1>
            <br><br><h3 style="color: rgb(6, 123, 248);text-shadow:3px 3px rgb(96, 187, 187);font-weight: 1000;font-size: 40px;padding-bottom:0px;">Insert a Insurance</h3>
            
            <br><br><br>
  


          


            
            <br><br>  
            <label for="Ins_type">Insurance type:</label>
            <input type="text" id="Ins_type" name="Ins_type">
            
            <br><br>
            <label for="Ins_company">Insurance company:</label>
            <input type="text" id="Ins_company" name="Ins_company" >
        
        
       
        
            
            
    
        
        
          
    
              <br><br><br><input type="submit" value="Submit"> <br> <br><br> <br>
        </h1>      
        
    
    </form>
</body>
</html>
    