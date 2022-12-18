


<body style = 'background-color:  #DBF9FC;color: black;font-weight: 2000;font-style: italic;font-size: 20;text-align:left;'>


<?php 

include "config.php"; 



if (!empty($_POST['since']) AND !empty($_POST['until'])  AND !empty($_POST['d_id'])AND !empty($_POST['p_id'])) 

{ 
    $since = $_POST['since']; 
    $until = $_POST['until'];
    $d_id = $_POST['d_id'];
    $p_id = $_POST['p_id'];


    $sql_statement = "INSERT into treats(since,until,d_id,p_id)
    VALUES  ('$since','$until','$d_id','$p_id')"; 

    $result = mysqli_query($hospital_db, $sql_statement);
    if($result == 1)
    {
        echo "Succesfully inserted the treatment ". "<br>";
        $newURL = "index_treats.php";
        header( "refresh:2;url=".$newURL );
    }
    else
    {
        //echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "Problem occurred while inserting." ;
        $newURL = "insert_treat.html";
        echo "<Br>You are redirecting to the insertion page..." ;
        header( "refresh:5;url=".$newURL );
    }

} 
else 
{
    $newURL = "insert_treat.html";
    
    echo "Missing information. Please fill in all of the blanks." ."<Br><Br><Br><Br>".  "You are redirecting to the insertion page..." ;
    header( "refresh:5;url=".$newURL );

}

?>
</body>