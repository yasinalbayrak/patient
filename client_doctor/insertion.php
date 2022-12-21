


<body style = 'background-color:  #DBF9FC;color: black;font-weight: 2000;font-style: italic;font-size: 20;text-align:left;'>


<?php 

include "config.php"; 



if (!empty($_POST['d_id']) AND isset($_POST['p_id'])  AND isset($_POST['med_id'])  and (! empty($_POST['since']) and isset($_POST['since'])) and (! empty($_POST['until']) and isset($_POST['until'])) ) 
{ 
    
    $docid = $_POST['d_id'];
    $p_id = $_POST['p_id'];
    $mcode = $_POST['med_id'];
    
    
    $since = date('Y-m-d', strtotime($_POST['since']));
    $until = date('Y-m-d', strtotime($_POST['until']));

   



    if(isset($_POST['med_id']))
    {
        if(empty($_POST['tid']))
            $hospid = 7;
        else   $hospid = $_POST['tid'];
        $sql_statement1 = "INSERT into prescribed(p_id,m_code,time_indays)
        VALUES  ($p_id,$mcode,$hospid)";
        
        $result = mysqli_query($hospital_db, $sql_statement1);
        
        $sql_statement2 = "INSERT into treats(since,until,d_id,p_id)
        VALUES  ('$since','$until',$docid,$p_id)"; 
    
        $result2 = mysqli_query($hospital_db, $sql_statement2);
        if($result == 1 and $result2 == 1)
        {
            echo "Succesfully inserted <br>";
            $newURL = "insert_treatment.php";
            header( "refresh:2;url=".$newURL );
        }
        else 
        {
            //echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
            echo "Problem occurred while inserting." ;
            $newURL = "insert_treatment.php";
            echo "<Br>You are redirecting to the main page..." ;
            header("refresh:3;url=".$newURL );
        }
    }
    else{
        $sql_statement2 = "INSERT into treats(since,until,d_id,p_id)
        VALUES  ('$since','$until',$docid,$p_id)"; 
    
        $result2 = mysqli_query($hospital_db, $sql_statement2);
        if($result2 == 1)
        {
            echo "Succesfully inserted <br>";
            $newURL = "insert_treatment.php";
            header( "refresh:2;url=".$newURL );
        }
        else 
        {
            //echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
            echo "Problem occurred while inserting." ;
            $newURL = "insert_treatment.php";
            echo "<Br>You are redirecting to the main page..." ;
            header("refresh:3;url=".$newURL );
        }
    }


    
     
    

} 
else 
{
    $newURL = "insert_treatment.php";
    
    echo "Missing information. Please fill in all of the blanks." ."<Br><Br><Br><Br>".  "You are redirecting to the insertion page..." ;
    header( "refresh:2;url=".$newURL );

}

?>
</body>