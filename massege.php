<?php
$alert = (isset($_GET["alert"])) ? $_GET["alert"] : "default";

switch ($alert) {
    case "no-email":
        echo '<div class="alert-warning" role="alert">
            U heeft geen email ingevoert, probeer opnieuw...
          </div>';
        header("Refresh: 3; ./index.php?content=register");
        break;
    case "emailexist":
        echo '<div class="alert-warning" role="alert">
            Het door u ingevulde email bestaat al, probeer opnieuw met een ander email...
          </div>';
        header("Refresh: 3; ./index.php?content=register");
        break;
    case "register-error";
        echo '<div class="alert-danger" role="alert">
            Er is iets fout gegaan met het regitratieprosses... Probeer het nogmaals of neem contact op met 333736@student.mboutrecht.nl
            </div>';
        header("Refresh: 3; ./index.php?content=register");
        break;
    case "register-succses";
        echo '<div class="alert-success" role="alert">
            U bent succesvol geregistreert. U ontvangt een e-mail met een activatie-link. 
        </div>';
        header("Refresh: 3; ./index.php?content=login");
        break;
    default:
        header("Location: ./index.php?content=home");
        break;
}
