


<body style = 'background-color:  #DBF9FC;color: black;font-weight: 2000;font-style: italic;font-size: 20;text-align:left;'>


<?php 

include "config.php"; 



if (isset($_POST['p_id']) and isset($_POST['policy_id'])   and(! empty($_POST['end_date']) and isset($_POST['end_date']))) 
{ 
    
    $p_id = $_POST['p_id'];
    
    $policy_id = $_POST['policy_id']; 
    
    $end_date = date('Y-m-d', strtotime($_POST['end_date']));
    
    
    




    

    $sql_statement = "INSERT into covered_by(p_id,policy_id,end_date)
        VALUES  ($p_id,$policy_id,'$end_date')"; 

    $result = mysqli_query($hospital_db, $sql_statement);
    
    if($result == 1)
    {
        echo "Succesfully inserted the covering policy to patient with id: ". $p_id. "<br>";
        $newURL = "index_covered.php";
        header( "refresh:2;url=".$newURL );
    }
    else if ($result != 1)
    {
        //echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "Problem occurred while inserting." ;
        $newURL = "index_covered.php";
        echo "<Br>You are redirecting to the main page..." ;
        header("refresh:3;url=".$newURL );
    }

    
    

} 
else 
{
    $newURL = "insert_covered.php";
    
    echo "Missing information. Please fill in all of the blanks." ."<Br><Br><Br><Br>".  "You are redirecting to the insertion page..." ;
    header( "refresh:1;url=".$newURL );

}

?>
</body>