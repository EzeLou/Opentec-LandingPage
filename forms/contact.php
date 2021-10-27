<?php 

// database connection code
//if(isset($_POST['first_name']))
//{
//$con = mysqli_connect('localhost', 'database_user', 'database_password','database');
									
// check connection

// get the post records

function onClick(e) {
    e.preventDefault();
    grecaptcha.ready(function() {
        grecaptcha.execute('6Leti88cAAAAAN8t9tthY9v2l30MTPqLCroZl4k_', {action: 'submit'}).then(function(token) {
            $con = mysqli_connect('localhost', 'w1130359_pepe', 'formDatabase2021','w1130359_Contact');
            if(!$con){
                echo 'Connection error: '. mysqli_connect_error();
            }
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $description = $_POST['description'];

            //send email
            $email_to  = 'alejavtoledo@gmail.com'.','.'deftflamink@gmail.com';
            $email_subject = "Nueva Consulta OPENTEC";
            $email_body = '<table><tr><th>Nombre: </th><th>'.$first_name.' '.$last_name.'</th></tr><tr><th>Telefono: </th><th>'.$phone.'</th></tr><tr><th>Email: </th><th>'.$email.'</th></tr><tr><th>Consulta: </th><th>'.$description.'</th></tr></table>';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $headers .= 'From: contacto-pagina@opentec.com.ar' . "\r\n" . 'Reply-To: info@opentec.com.ar' . "\r\n";

            mail($email_to,$email_subject,$email_body,$headers);
            header( 'Location: https://opentec.com.ar/');

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

            //Importatn
            mysqli_close($con);
        });
    });
}

?>