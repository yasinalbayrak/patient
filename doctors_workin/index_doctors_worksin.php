<!DOCTYPE html>
<html>
<head>
	<title>Works In</title>

<style>

@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&family=Roboto:wght@400;500;700&display=swap");
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.button_insert {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  } /* Blue */
.button_delete{
  background-color: red;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;

}
.button_filter{
  background-color: grey;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;

}
.outer {
  border-radius: 2px;
  background-color: #f2f2f2;
  background-image:url('pht.jpg');
  padding: 1px;
  background-attachment: fixed;
  background-size: 100% 100%;
  height: 100%;

}
body{
    margin:0px;
    height: 100%;
}
b{
    color: rgb(105, 0, 166);
    font-weight: 500px;
    font-size: 50px;
    font-style: italic;

    padding-bottom:10px;
    
}
.container {
  padding:8px;
  width: 1000px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}
.container .btn {
  position: relative;
  top: 0;
  left: 0;
  width: 250px;
  height: 50px;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}
.container .btn a {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  background: rgba(255, 255, 255, 0.05);
  box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 30px;
  padding: 10px;
  letter-spacing: 1px;
  text-decoration: none;
  overflow: hidden;
  color: purple;
  font-weight: bold;
  z-index: 1;
  transition: 0.5s;
  backdrop-filter: blur(15px);
}
.container .btn:hover a {
  letter-spacing: 3px;
}
.container .btn a::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 50%;
  height: 100%;
  background: linear-gradient(to left, rgba(255, 255, 255, 0.15), transparent);
  transform: skewX(45deg) translate(0);
  transition: 0.5s;
  filter: blur(0px);
}
.container .btn:hover a::before {
  transform: skewX(45deg) translate(200px);
}
.container .btn::before {
  content: "";
  position: absolute;
  left: 50%;
  transform: translatex(-50%);
  bottom: -5px;
  width: 30px;
  height: 10px;
  background: #f00;
  border-radius: 10px;
  transition: 0.5s;
  transition-delay: 0.5;
}
.container .btn:hover::before /*lightup button*/ {
  bottom: 0;
  height: 50%;
  width: 80%;
  border-radius: 30px;
}

.container .btn::after {
  content: "";
  position: absolute;
  left: 50%;
  transform: translatex(-50%);
  top: -5px;
  width: 30px;
  height: 10px;
  background: #f00;
  border-radius: 10px;
  transition: 0.5s;
  transition-delay: 0.5;
}
.container .btn:hover::after /*lightup button*/ {
  top: 0;
  height: 50%;
  width: 80%;
  border-radius: 30px;
}
.container .btn:nth-child(2)::before, /*chnage 1*/
.container .btn:nth-child(2)::after {
  background: #ff1f71;
  box-shadow: 0 0 5px #ff1f71, 0 0 15px #ff1f71, 0 0 30px #ff1f71,0 0 60px #ff1f71;
}
.container .btn:nth-child(3)::before, /* 2*/
.container .btn:nth-child(3)::after {
  background: #2db2ff;
  box-shadow: 0 0 5px #2db2ff, 0 0 15px #2db2ff, 0 0 30px #2db2ff,
    0 0 60px #2db2ff;
}
.container .btn:nth-child(1)::before, /* 3*/
.container .btn:nth-child(1)::after {
  background: #1eff45;
  box-shadow: 0 0 5px #1eff45, 0 0 15px #1eff45, 0 0 30px #1eff45,
    0 0 60px #1eff45;
}

.mybody{
  padding:8px;
  margin :8px;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: linear-gradient(to bottom, #360049, #350048); /*fiolet*/
}
* {
  
  box-sizing: border-box;
  font-family: "Roboto", sans-serif;
}
</style>


</head>
<body >
    
    
<div class="outer" align="center">
<b>WORK INFORMATIONS IN OUR DATABASE: </b>
<br>
<br>

<br>
<br>
<mybody>
<div class="container">

  <div class="btn"><a href="insert_workinfo.php"> Insert new work info </a></button>
</div>

  <div class="btn"><a href="workinfo_admin.php">Delete a work info </a></button>
</div>

  <div class="btn"><a href="workinfo_selection.php">Filter work infos</a></button>
    </div>
</div>
</mybody>
<?php 
include "doctors_works_in.php";
?>
<div class="container">

<div class="btn"><a href="http://localhost/patient/main/main.php">Go to main page </a></button>
    </div>
    </div>

</div>

</div>
</body>
</html>