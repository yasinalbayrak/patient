


<body style = 'background-color:  #DBF9FC;color: black;font-weight: 2000;font-style: italic;font-size: 20;text-align:left;'>


<?php 

include "config.php"; 



if (!empty($_POST['n_name']) and  !empty($_POST['age'])  and !empty($_POST['n_salary']) and !empty($_POST['n_address'])  and !empty($_POST['gender'])) 

{ 
    $n_name = $_POST['n_name']; 
    $n_age = $_POST['age']; 
    $n_salary = $_POST['n_salary']; 
    $n_address = $_POST['n_address']; 
    $n_gender = $_POST['gender']; 
    $sql_statement = "INSERT into nurses(n_name,age,n_salary,n_address,gender)
    VALUES  ('$n_name',$n_age,'$n_salary','$n_address','$n_gender')"; 

    $result = mysqli_query($hospital_db, $sql_statement);
    if($result == 1)
    {
        echo "Succesfully inserted the nurse: ". $n_name. "<br>";
        $newURL = "index_nurses.php";
        header( "refresh:2;url=".$newURL );
    }
    else
    {
        //echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "Problem occurred while inserting." ;
        $newURL = "insert_nurse.html";
        echo "<Br>You are redirecting to the insertion page..." ;
        header( "refresh:5;url=".$newURL );
    }

    } 
    else 
    {
    $newURL = "insert_nurse.html";

    echo "Missing information. Please fill in all of the blanks." ."<Br><Br><Br><Br>".  "You are redirecting to the insertion page..." ;
    header( "refresh:5;url=".$newURL );

    }

?>
</body>