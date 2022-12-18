


<body style = 'background-color:  #DBF9FC;color: black;font-weight: 2000;font-style: italic;font-size: 20;text-align:left;'>


<?php 

include "config.php"; 



if (isset($_POST['d_id']) and isset($_POST['branch_code'])  and isset($_POST['hospital_id']) and(! empty($_POST['since']) and isset($_POST['since']))) 
{ 
    
    $docid = $_POST['d_id'];
    
    $bcode = $_POST['branch_code']; 
    $hospid = $_POST['hospital_id'];
    $since = date('Y-m-d', strtotime($_POST['since']));
    
    if(empty($_POST['until']))
        $until = NULL;
    else   $until = date('Y-m-d', strtotime($_POST['until']));
    
    $check_statement = "SELECT * FROM has_branches WHERE branch_code = $bcode AND hospital_id = $hospid";
    $res = mysqli_query($hospital_db, $check_statement);
    if(mysqli_num_rows($res) == 0 )
    {
        echo "This hospital does not have branch with the given code. " ;
        $newURL = "insert_workinfo.php";
        echo "<Br>You are redirecting to the main page..." ;
        header( "refresh:5;url=".$newURL );

    }//2022-12-01 2022-12-17Succesfully inserted the working info of: 4000
    else if( $until < $since && $until != NULL) 
    {
        echo "There is something wrong with the dates" ;
        $newURL = "insert_workinfo.php";
        echo "<Br>You are redirecting to the main page..." ;
        header( "refresh:5;url=".$newURL );

//Warning: mysqli_num_rows() expects parameter 1 to be mysqli_result, boolean given in C:\xampp\htdocs\patient\doctors_workin\insertion_w.php on line 27

    }
    else 
    {

        $since = date('Y-m-d', strtotime($_POST['since']));
        if($until != NULL)
            $until = date('Y-m-d', strtotime($_POST['until']));
        else{
            $until = NULL;
        }


        
        if($until != NULL)
        
            $sql_statement = "INSERT into doctor_worksin(d_id,branch_code,hospital_id,since,until)
            VALUES  ($docid,$bcode,$hospid,'$since','$until')"; 
        else
            $sql_statement = "INSERT into doctor_worksin(d_id,branch_code,hospital_id,since,until)
            VALUES  ($docid,$bcode,$hospid,'$since',NULL)"; 
        $result = mysqli_query($hospital_db, $sql_statement);
        
        if($result == 1)
        {
            echo "Succesfully inserted the working info of: ". $docid. "<br>";
            $newURL = "index_doctors_worksin.php";
            header( "refresh:2;url=".$newURL );
        }
        else if ($result != 1)
        {
            //echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
            echo "Problem occurred while inserting." ;
            $newURL = "index_doctors_worksin.php";
            echo "<Br>You are redirecting to the main page..." ;
            header("refresh:3;url=".$newURL );
        }
    
    }   
    

} 
else 
{
    $newURL = "insert_workinfo.php";
    
    echo "Missing information. Please fill in all of the blanks." ."<Br><Br><Br><Br>".  "You are redirecting to the insertion page..." ;
    header( "refresh:1;url=".$newURL );

}

?>
</body>