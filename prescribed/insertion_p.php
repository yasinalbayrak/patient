


<body style = 'background-color:  #DBF9FC;color: black;font-weight: 2000;font-style: italic;font-size: 20;text-align:left;'>


<?php 

include "config.php"; 



if (isset($_POST['p_id']) and isset($_POST['med_id'])  ) 
{ 
    
    $docid = $_POST['p_id'];
    
    $bcode = $_POST['med_id']; 
    

    if(empty($_POST['tid']))
        $hospid = 7;
    else   $hospid = $_POST['tid'];
    
   





    $sql_statement = "INSERT into prescribed(p_id,m_code,time_indays)
        VALUES  ($docid,$bcode,$hospid)"; 
    $result = mysqli_query($hospital_db, $sql_statement);
    if($result == 1)
    {
        echo "Succesfully inserted the prescription info of: ". $docid. "<br>";
        $newURL = "index_prescribed.php";
        header( "refresh:2;url=".$newURL );
    }
    else 
    {
        //echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "Problem occurred while inserting." ;
        $newURL = "index_prescribed.php";
        echo "<Br>You are redirecting to the main page..." ;
        header("refresh:3;url=".$newURL );
    }
    
     
    

} 
else 
{
    $newURL = "insert_preinfo.php";
    
    echo "Missing information. Please fill in all of the blanks." ."<Br><Br><Br><Br>".  "You are redirecting to the insertion page..." ;
    header( "refresh:2;url=".$newURL );

}

?>
</body>