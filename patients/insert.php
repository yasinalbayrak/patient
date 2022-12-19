<body style = 'background-color:  #DBF9FC;color: black;font-weight: 2000;font-style: italic;font-size: 20;text-align:left;'>


<?php 

include "config.php"; 



if (!empty($_POST['p_name']) and  !empty($_POST['age']) and !empty($_POST['P_allergicreaction']) and !empty($_POST['p_diagnosis']) and !empty($_POST['p_address'])  and !empty($_POST['gender'])) 

{ 
    $sname = $_POST['p_name']; 
    $age = $_POST['age']; 
    $P_allergicreaction = $_POST['P_allergicreaction']; 
    $p_diagnosis = $_POST['p_diagnosis']; 
    $p_address = $_POST['p_address']; 
    $gender = $_POST['gender']; 
    $sql_statement = "INSERT into patients(p_name,age,P_allergicreaction,p_diagnosis,p_address,gender)
    VALUES  ('$sname',$age,'$P_allergicreaction','$p_diagnosis','$p_address','$gender')"; 


    $result = mysqli_query($hospital_db, $sql_statement);
    if($result == 1)
    {
        echo "Succesfully inserted the patient: ". $sname. "<br>";
        $newURL = "index.php";
        header( "refresh:2;url=".$newURL );
    }
    else
    {
        //echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "Problem occurred while inserting." ;
        $newURL = "insert_patient.html";
        echo "<Br>You are redirecting to the insertion page..." ;
        header( "refresh:5;url=".$newURL );
    }

    } 
    else 
    {
    $newURL = "insert_patient.html";

    echo "Missing information. Please fill in all of the blanks." ."<Br><Br><Br><Br>".  "You are redirecting to the insertion page..." ;
    header( "refresh:5;url=".$newURL );

    }

?>
</body>