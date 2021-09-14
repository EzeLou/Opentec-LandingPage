<?php 

// database connection code
//if(isset($_POST['first_name']))
//{
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$con = mysqli_connect('127.0.0.1:3306', 'u742194444_OPENTEC', 'Canada2020','u742194444_contact_form');

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

//send email
$email_to = "thiagonicomb.xd@gmail.com";
$email_subject = "Nueva Consulta OPENTEC";
$email_body = '<table><tr><th>Nombre: </th><th>'.$first_name.' '.$last_name.'</th></tr><tr><th>Telefono: </th><th>'.$phone.'</th></tr><tr><th>Email: </th><th>'.$email.'</th></tr><tr><th>Consulta: </th><th>'.$description.'</th></tr></table>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$headers .= 'From: Contacto-Pagina@opentec.com' . "\r\n" . 'Reply-To: info@opentec.com.ar' . "\r\n";

mail($email_to,$email_subject,$email_body,$headers);
header( 'Location: https://deftflamink.com/test/');

https://deftflamink.com/test/
// database insert SQL code
$sql = "INSERT INTO contacts (first_name,last_name,phone,email,description) VALUES ('$first_name', '$last_name', '$phone', '$email', '$description')";
echo $sql;
// insert in database

$rs = mysqli_query($con, $sql);


if($rs)
{
	echo "Contact Records Inserted";
}
//}
else
{
	echo "Are you a genuine visitor?" . mysqli_error($con);
}
mysqli_close($con);
echo"lol2";


?>