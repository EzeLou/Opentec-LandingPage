<?php 

// database connection code
if(isset($_POST['first_name']))
{
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$con = mysqli_connect('156.67.72.104:443', 'u742194444_OPENTEC', 'deftFlamink2021','u742194444_contact_form');

// check connection
if(!$con){
    echo 'Connection error: '. mysqli_connect_error();
}

// get the post records

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$description = $_POST['description'];

// database insert SQL code
$sql = "INSERT INTO 'tbl_contact' ('contact_id','first_name','last_name','phone','email','description') VALUES ('0', '$first_name', '$last_name', '$phone', '$email', '$description')";
echo"lol";
// insert in database 
$rs = mysqli_query($con, $sql);
if($rs)
{
	echo "Contact Records Inserted";
}
}
else
{
	echo "Are you a genuine visitor?";
	
}
echo"lol2";


?>