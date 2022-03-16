<?php
    include("./connect_db.php");
    $per_page = 3;

    $sql = "SELECT * FROM `allartikel`" ;   
    
    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    $pages = ceil($count/$per_page);

    if(isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }

    $start = ($page - 1)*$per_page;

    $sql = "SELECT * FROM `allartikel` limit $start, $per_page";

    $result = mysqli_query($conn, $sql);
        $row = "";
        while ($record = mysqli_fetch_assoc($result)){
            $row .= "<div class='card col-3'>
                    <div class='container'>
                    <h3>{$record['titel']}</h3>
                    <p>{$record['artikel']}</p>
                    <p>{$record['auteur']}</p>
                    </div>
                    </div>";
        }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/grid.css">
    <title>Daagelijks Papier</title>
</head>

<body>

    <div class="col-l-12">
        <?php echo $row; ?>
    </div>
        <ul class="page-back">
           <?php 
                for ($i=1; $i<=$pages; $i++){
                    echo '<li class="page-item">
                            <a class="page-link" href="./index.php?content=overzicht&page=' . $i .'">' . $i . '</a>
                          </li>';
                }
             ?>
        </ul>
</body>

</html>