<?php session_start(); session_gc(); ?>
<header>
  <nav>
    <div id="logo">
      <img src="./img/logoNav.png" alt="logo" id="logonav">
    </div>
    <ul>
      <?php
        if (isset($_SESSION["id"])) {
          echo '<li><a href="./index.php?content=logout">Uitloggen</a></li>';
        } else {
          echo '<li><a href="./index.php?content=register">Register</a></li>
                <li><a href="./index.php?content=login">Login</a></li>';
        }
      ?>
    </ul>
    <ul>
      <?php
      if (isset($_SESSION["id"]) AND $_SESSION["userrole"] == "root" || isset($_SESSION["id"])  AND $_SESSION["userrole"] == "write") {
        echo '  <li><a href="./index.php?content=home">Home</a></li>
                <li><a href="./index.php?content=overzicht">Overzicht</a></li>
                <li><a href="./index.php?content=dashboard">Dashboard</a></li>';
      } else if (isset($_SESSION["id"])  AND $_SESSION["userrole"] == "customer"){
        echo '<li><a href="./index.php?content=home">Home</a></li>
              <li><a href="./index.php?content=overzicht">Overzicht</a></li>';
      } else {
        echo '<li><a href="./index.php?content=home">Home</a></li>';
      }
      ?>    
    </ul>
  </nav>
</header>