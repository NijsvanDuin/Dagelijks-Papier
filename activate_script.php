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
            echo "update";
        } else {
        header("Location: ./index.php?content=massege&alert=idpqhmatch");
        }
    }
?>
