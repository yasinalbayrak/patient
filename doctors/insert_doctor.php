


<body style = 'background-color:  #DBF9FC;color: black;font-weight: 2000;font-style: italic;font-size: 20;text-align:left;'>


<?php 

include "config.php"; 



if (!empty($_POST['d_name']) and  !empty($_POST['age']) and !empty($_POST['specialization']) and !empty($_POST['d_salary']) and !empty($_POST['d_address'])  and !empty($_POST['gender'])) 

{ 
    $d_name = $_POST['d_name']; 
    $d_age = $_POST['age']; 
    $specialization= $_POST['specializaiton'];
    $d_salary = $_POST['d_salary']; 
    $d_address = $_POST['d_address']; 
    $d_gender = $_POST['gender']; 
    $sql_statement = "INSERT into doctors(d_name,age,d_salary,d_address,gender,specialization)
    VALUES  ('$d_name',$d_age,'$d_salary','$d_address','$d_gender','$specializaiton')"; 

    $result = mysqli_query($hospital_db, $sql_statement);
    if($result == 1)
    {
        echo "Succesfully inserted the doctor: ". $d_name. "<br>";
    }
    else
    {
        //echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "Problem occurred while inserting." ;
    }
    $newURL = "insert_doctor.html";
    echo "<Br>You are redirecting to the insertion page..." ;
    header( "refresh:5;url=".$newURL );
} 
else 
{
    $newURL = "insert_doctor.html";
    
    echo "Missing information. Please fill in all of the blanks." ."<Br><Br><Br><Br>".  "You are redirecting to the insertion page..." ;
    header( "refresh:5;url=".$newURL );

}

?>
</body>