


<body style = 'background-color:  #DBF9FC;color: black;font-weight: 2000;font-style: italic;font-size: 20;text-align:left;'>


<?php 

include "config.php"; 



if (!empty($_POST['hospital_id']) and !empty($_POST['location']) and !empty($_POST['address'])) 

{ 
    $id = $_POST['hospital_id']; 
    $loc = $_POST['location'];
    $addr = $_POST['address'];
    $max_branchcode = "SELECT MAX(branch_code) FROM has_branches WHERE hospital_id = $id";
   
    $res = mysqli_query($hospital_db, $max_branchcode);
    $row1 = mysqli_fetch_assoc($res);
    if((int)$row1['MAX(branch_code)'] == 0)
    {
        $branch_code = 5050;
    }
    else
        $branch_code = (int)$row1['MAX(branch_code)']+1;

    $send_id = (int)$id;

    $sql_statement = "INSERT into has_branches(hospital_id,location,address,branch_code)
    VALUES  ($send_id,'$loc','$addr',$branch_code)"; 
    $result = mysqli_query($hospital_db, $sql_statement);
    
    if($result == 1)
    {
        echo "Succesfully inserted the branch to the location: ". $loc. "/$addr <br>";
        $newURL = "branches_index.php";
        header( "refresh:2;url=".$newURL );
    }
    else
    {
        //echo "<h3 style='color: rgb(105, 0, 166);font-weight: 500;font-size: 20;padding-bottom:0px;'>". "Filtered Data:."."</h3>";
        echo "Problem occurred while inserting." ;
        $newURL = "insert_branch.php";
        echo "<Br>You are redirecting to the main page..." ;
        header( "refresh:5;url=".$newURL );
    }
    




} 
else 
{
    $newURL = "insert_branch.php";
    
    echo "Missing information. Please fill in all of the blanks." ."<Br><Br><Br><Br>".  "You are redirecting to the insertion page..." ;
    header( "refresh:5;url=".$newURL );

}

?>
</body>