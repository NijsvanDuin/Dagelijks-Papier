<?php
    include("./functions.php");
    include("./connect_db.php");
    $id = sanitize($_POST["id"]);
    $pwh = sanitize($_POST["pwh"]);
    $password = sanitize($_POST["password"]);
    $passwordCheck = sanitize($_POST["passwordCheck"]);


    if (empty($_POST["password"]) || empty($_POST["passwordCheck"])) {
        header("Location: ./index.php?content=massege&alert=emtypass&id=$id&pwh=$pwh");
    } elseif (strcmp($password,$passwordCheck)) {
        header("Location: ./index.php?content=massege&alert=nomatchpass&id=$id&pwh=$pwh");
    } else {
        $sql = "SELECT * FROM `register` WHERE `id` = '$id' AND `password` = '$pwh'";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)) {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $sql = "UPDATE `register` 
                    SET `password` = '$password_hash' 
                    WHERE `id` = $id 
                    AND `password` = '$pwh'";
            if (mysqli_query($conn, $sql)) {
                //yep
                header("Location: ./index.php?content=massege&alert=suc-up");
            } else {
                header("Location: ./index.php?content=massege&alert=err-up&id=$id&pwh=$pwh");
            }

        } else {
        header("Location: ./index.php?content=massege&alert=idpqhmatch");
        }
    }
?>
