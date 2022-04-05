<?php
    // Hier wordt connect db gebruikt om verbinding te maken met de database
    include("./connect_db.php");

    $id = $_GET["id"];
    // Hier wordt het lijstje verwijderd
    $sql = "DELETE FROM `register` WHERE `id` = $id";

    mysqli_query($conn, $sql);

    header("Location: ./index.php?content=massege&alert=delete-suc");
?>