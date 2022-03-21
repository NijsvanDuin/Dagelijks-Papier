<?php
include("./connect_db.php");
include("./functions.php");

$email = sanitize($_POST["email"]);
$password = sanitize($_POST["password"]);
var_dump($_POST);

if(empty($email) || empty($password)) {
    header("Location: ./index.php?content=massege&alert=no-email-or-password");
} else {
    $sql = "SELECT * FROM `register` WHERE `email` = '$email'";
    $result = mysqli_query($conn,$sql);
    mysqli_num_rows($result);
            if (!mysqli_num_rows($result)){
            header("Location: ./index.php?content=massege&alert=email-un");
            } else {
                $record = mysqli_fetch_assoc($result);
                if(!$record["activated"]) {
                    header("Location: ./index.php?content=massege&alert=non-act&email=$email");
                } else {
                    echo "Klaar voor inlog";
                }
            }
}

?>