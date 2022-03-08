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
    <div id="page-container">
        <div id="content-wrap">
            <main>
                <section class="container">
                    <div class="row">
                        <div class="col-12">
                        <?php include("./navbar.php");?> 
                        </div>
                    </div>
                </section>
                <section class="container">
                    <div class="row">
                        <div class="col-12 test">
                            <?php include("./content.php");?>
                        </div>
                    </div>
                </section>
                <section class="container">
                    <div class="row">
                        <div class="col-12 test">
                            <?php include("./footer.php");?>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
    <script src="./js/app.js"></script>
</body>
</html>