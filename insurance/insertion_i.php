


<body style = 'background-color:  #DBF9FC;color: black;font-weight: 2000;font-style: italic;font-size: 20;text-align:left;'>


<?php 

include "config.php"; 



if (!empty($_POST['Ins_type']) and !empty($_POST['Ins_company']) ) 
{ 
    
    $ins_type = $_POST['Ins_type'];
    
    $ins_company = $_POST['Ins_company']; 



    $sql_statement = "INSERT into insurance(Ins_type,Ins_company)
        VALUES  ('$ins_type','$ins_company')"; 

    $result = mysqli_query($hospital_db, $sql_statement);
    
    if($result == 1)
    {
        echo "Succesfully inserted the insurance. <br>";
        $newURL = "index_insurance.php";
        header( "refresh:2;url=".$newURL );
    }
    else 
    {
        //echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "Problem occurred while inserting." ;
        $newURL = "index_insurance.php";
        echo "<Br>You are redirecting to the main page..." ;
        header("refresh:3;url=".$newURL );
    }

  
    

} 
else 
{
    $newURL = "insert_insurance.php";
    
    echo "Missing information. Please fill in all of the blanks." ."<Br><Br><Br><Br>".  "You are redirecting to the insertion page..." ;
    header( "refresh:2;url=".$newURL );

}

?>
</body>