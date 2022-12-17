


<body style = 'background-color:  #DBF9FC;color: black;font-weight: 2000;font-style: italic;font-size: 20;text-align:left;'>


<?php 

include "config.php"; 



if (!empty($_POST['hospital_name']) ) 

{ 
    $sname = $_POST['hospital_name']; 
    $roomNum = empty($_POST['room_number']) ? 100 : $_POST['room_number'];


    $sql_statement = "INSERT into hospitals(hospital_name,room_number)
    VALUES  ('$sname',$roomNum)"; 

    $result = mysqli_query($hospital_db, $sql_statement);
    if($result == 1)
    {
        echo "Succesfully inserted the hospital: ". $sname. "<br>";
        $newURL = "hospitals_index.php";
        header( "refresh:2;url=".$newURL );
    }
    else
    {
        //echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "Problem occurred while inserting." ;
        $newURL = "insert_hospital.html";
        echo "<Br>You are redirecting to the insertion page..." ;
        header( "refresh:5;url=".$newURL );
    }

} 
else 
{
    $newURL = "insert_hospital.html";
    
    echo "Missing information. Please fill in all of the blanks." ."<Br><Br><Br><Br>".  "You are redirecting to the insertion page..." ;
    header( "refresh:5;url=".$newURL );

}

?>
</body>