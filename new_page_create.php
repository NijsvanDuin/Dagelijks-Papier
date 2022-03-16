<?php
    include("./connect_db.php");

    $titel = $_POST["titel"];
    $artikel = $_POST["artikel"];
    $auteur = $_POST["auteur"];

    $sql =  "INSERT INTO `allartikel` (`titel`, `artikel`, `auteur`)
          VALUES ('$titel', '$artikel', '$auteur');";

mysqli_query($conn, $sql);
header('Location:./index.php?content=massege&alert=artsave');
?>