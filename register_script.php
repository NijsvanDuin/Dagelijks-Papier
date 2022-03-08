<?php
//var_dump(headers_list()); exit;
if (empty($_POST["email"])) {
    $alert = "no-email";
} else {
    include("./connect_db.php");
    include("./functions.php");

    $email = sanitize($_POST["email"]);

    $sql = "SELECT * FROM `register` WHERE `email` = '$email'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)) {
        $alert = "emailexist";
    } else {
        $password = "geheim";
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO `register` (`id`, `email`, `password`, `userrole`) VALUES (NULL,'$email','$password_hash','customer')";
        if (mysqli_query($conn,$sql)) {
            $id = mysqli_insert_id($conn);
            $to = $email;
            $subject = "Activatie link voor u account bij Dagelijks Papier";
            $massege = '<style> .email {background-color: #e9e9e9;} </style>
            <div class="email">
            <h2>Beste Gebruiker</h2>
            <p>U heeft zich geregistreert bij www.daagelijkspapier.nl.</p>
            <p>Klik <a href="http://www.dagelijkspapier.local/index.php?content=activate&id=' . $id . '&pwh=' . $password_hash . '">hier</a> voor het activere en wijsigen van wachtwoord van uw account.</p>
            <p>Bedankt voor het registreren!</p><br>
            <p>Met vriendelijke groet,</p>
            <p>N. van Duin</p>
            <p>B. achternaam</p>
            <p><strong>CEO Daagelijks Papier INC.</strong></p>
            </div>';

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";
            $headers .= "From: admin@dagelijkspapier.org\r\n";
            $headers .= "Bcc: root@dagelijkspapier.org";

            mail($to,$subject,$massege,$headers);

            $alert = "register-succses";
        } else {
            $alert = "register-error";
        }
    
    }
}

header('Location:./index.php?content=massege&alert='.$alert); exit();
?>