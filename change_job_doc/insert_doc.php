


<body style = 'background-color:  #DBF9FC;color: black;font-weight: 2000;font-style: italic;font-size: 20;text-align:left;'>


<?php 

include "config.php"; 



if (
    (!empty($_POST['d_id']))
 and isset($_POST['hospital_id'])  
 and isset($_POST['branch_code'])
 and isset($_POST['hospital_idnew'])  
 and isset($_POST['branch_codenew']) 
 and isset($_POST['date'])  ) 
{ 
    
    $n_id = $_POST['d_id'];
    
    $hospital_id = $_POST['hospital_id'];
     
    $branch_code = $_POST['branch_code'];
    
    $hospital_idnew = $_POST['hospital_idnew'];
    
    $branch_codenew = $_POST['branch_codenew'];
    $date = $_POST['date'];
   




//Notice: Undefined variable: result in C:\xampp\htdocs\patient\change_job\insertion.php on line 44

    $sql_statement1 = "INSERT into doctors_worksin(d_id,branch_code,hospital_id,since,until)
    VALUES  ($d_id,$branch_codenew,$hospital_idnew,'$date',NULL)";
    $result1 = mysqli_query($hospital_db, $sql_statement1);

    $sql_statement2 = "UPDATE doctors_worksin SET until = '$date' 
    WHERE d_id= $d_id and branch_code = $branch_code  and hospital_id = $hospital_id ";
    
    
    $result2 = mysqli_query($hospital_db, $sql_statement2);
    
    if($result1 == 1 and $result2 ==1)
    {
        echo "Succesfully changed the job. <br>";
        $newURL = "change_job_doc.php";
        header( "refresh:2;url=".$newURL );
    }
    else 
    {
        //echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "Problem occurred while inserting." ;
        $newURL = "change_job_doc.php";
        echo "<Br>You are redirecting to the main page..." ;
        header("refresh:3;url=".$newURL );
    }
    
     
    

} 
else 
{
    $newURL = "change_job_doc.php";
    
    echo "Missing information. Please fill in all of the blanks." ."<Br><Br><Br><Br>".  "You are redirecting to the insertion page..." ;
    header( "refresh:2;url=".$newURL );

}

?>
</body>