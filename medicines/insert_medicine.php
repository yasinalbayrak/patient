


<body style = 'background-color:  #DBF9FC;color: black;font-weight: 2000;font-style: italic;font-size: 20;text-align:left;'>


<?php 

include "config.php"; 



if (!empty($_POST['mname']) AND !empty($_POST['mtype']) ) 

{ 
    $m_name = $_POST['mname']; 
    $m_type = $_POST['mtype'];


    $sql_statement = "INSERT into medicine(mname,mtype)
    VALUES  ('$m_name',$m_type)"; 

    $result = mysqli_query($hospital_db, $sql_statement);
    if($result == 1)
    {
        echo "Succesfully inserted the medicine: ". $m_name. "<br>";
        $newURL = "index_medicine.php";
        header( "refresh:2;url=".$newURL );
    }
    else
    {
        //echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "Problem occurred while inserting." ;
        $newURL = "insert_medicine.html";
        echo "<Br>You are redirecting to the insertion page..." ;
        header( "refresh:5;url=".$newURL );
    }

} 
else 
{
    $newURL = "insert_medicine.html";
    
    echo "Missing information. Please fill in all of the blanks." ."<Br><Br><Br><Br>".  "You are redirecting to the insertion page..." ;
    header( "refresh:5;url=".$newURL );

}

?>
</body>