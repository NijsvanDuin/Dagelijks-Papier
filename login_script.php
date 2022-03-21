<?php
include("./connect_db.php");
include("./functions.php");

$email = sanitize($_POST["email"]);
$password = sanitize($_POST["password"]);

if (empty($email) || empty($password)) {
    header("Location: ./index.php?content=massege&alert=no-email-or-password");
} else {
    $sql = "SELECT * FROM `register` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    mysqli_num_rows($result);
    if (!mysqli_num_rows($result)) {
        header("Location: ./index.php?content=massege&alert=email-un");
    } else {
        $record = mysqli_fetch_assoc($result);
        // var_dump($record["activated"]);
        if (!$record["activated"]) {
            header("Location: ./index.php?content=massege&alert=non-act&email=$email");
        } elseif (!password_verify($password, $record["password"])) {
            header("Location: ./index.php?content=massege&alert=pw-and-pwh-no&email=$email");
        } else {
            switch ($record["userrole"]) {
                case 'customer':
                    header("Location: ./index.php?content=c-home");
                    break;
                case 'root':
                    header("Location: ./index.php?content=r-home");
                    break;
                case 'write':
                    header("Location: ./index.php?content=w-home");
                    break;
                default:
                    header("Location: ./index.php?content=home");
                    break;
            }
        }
    }
}
?>