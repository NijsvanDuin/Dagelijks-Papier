<?php

    if(!(isset($_GET["content"]) && isset($_GET["id"]) && isset($_GET["pwh"])) ){
        header("Location: ./index.php?content=massege&alert=hacker");
    }

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-6">
            <form action="./index.php?content=activate_script" method="post">
                <div class="form-group">
                    <label for="InputPassword">Vul hier uw nieuwe wachtwoord:</label> <br>
                    <input name="password" type="password" class="form-control informReg" id="InputPassword" aria-describedby="emailHelp" placeholder="Wachtwoord">
                    <br>
                    <br>
                </div>
                <div class="form-group">
                    <label for="InputPassword">Vul hier uw wachtwoord opnieuw in:</label> <br>
                    <input name="passwordCheck" type="password" class="form-control informReg" id="InputPasswordCheck" aria-describedby="emailHelp" placeholder="Wachtwoord">
                    <br>
                </div>
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                <input type="hidden" name="pwh" value="<?php echo $_GET["pwh"]; ?>">
                <button type="submit" class="btn-Activeer">Activeer</button>
            </form>
        </div>
    </div>
</div>