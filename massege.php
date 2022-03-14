<?php
$alert = (isset($_GET["alert"])) ? $_GET["alert"] : "default";
$id = (isset($_GET["id"])) ? $_GET["id"] : "";
$pwh = (isset($_GET["password"])) ? $_GET["pwh"] : "";

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
    case "hacker";
        echo '<div class="alert-danger" role="alert">
            U heeft geen toegang tot deze pagina(GFYS). 
        </div>';
        header("Refresh: 3; ./index.php?content=register");
        break;
    case "emtypass";
        echo '<div class="alert-warning" role="alert">
        Een van de wachtwoord velden is leeg, probeer opnieuw.... 
        </div>';
        header("Refresh: 3; ./index.php?content=activate&id=$id&pwh=$pwh");
        break;
    case "nomatchpass";
        echo '<div class="alert-warning" role="alert">
        Wachtwoorden zijn niet gelijk, probeer opnieuw...
        </div>';
        header("Refresh: 3; ./index.php?content=activate&id=$id&pwh=$pwh");
        break;
    case "idpqhmatch":
        echo '<div class="alert-warning" role="alert">
            U staat niet in onze database, u wordt doorgestuurt naar de registatiepagina...
          </div>';
        header("Refresh: 3; ./index.php?content=register");
        break;
    case "suc-up":
        echo '<div class="alert-success" role="alert">
                                Uw account is geactiveert! U wordt nu doorgestuurt naar de inlogpagina...
                              </div>';
        header("Refresh: 3; ./index.php?content=login");
        break;
    case "err-up":
        echo '<div class="alert-danger" role="alert">
                                Het registratieproses is niet gelukt, kies een nieuw wachtwoord...
                              </div>';
        header("Refresh: 3; ./index.php?content=activate&id=$id&pwh=$pwh");
        break;
    default:
        header("Location: ./index.php?content=home");
        break;
}
