<?php

if (empty($_POST["email"])) {
    header("Location: ./index.php?content=massege&alert=no-email");
} else {
    include("./connect_db.php");
    include("./functions.php");

    $email = sanitize($_POST["email"]);

    $sql = "SELECT * FROM `register` WHERE `email` = '$email'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)) {
        header("Location: ./index.php?content=massege&alert=emailexist");
    } else {
        $password = "geheim";
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO `register` (`id`, `email`, `password`, `userrole`) VALUES (NULL,'$email','$password_hash','customer')";
        if (mysqli_query($conn,$sql)) {
            $id = mysqli_insert_id($conn);
            $to = $email;
            $subject = "Activatie link voor u account bij Dagelijks Papier";
            $massege = '';

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";
            $headers .= "From: admin@dagelijkspapier.org\r\n";
            $headers .= "Bcc: root@dagelijkspapier.org";

            mail($to,$subject,$massege,$headers);

            header("Location: ./index.php?content=massege&alert=register-succses");
        } else {
            header("Location: ./index.php?content=massege&alert=register-error");
        }
    
    }
}
