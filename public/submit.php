<?php

if(!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
  //header("Location: index.html");
  //exit;
}
?>
<html>
<meta charset="utf-8">
<title>Kochwettbewerb</title>
<link href="css/root.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<style>
#container{
  text-align: center;
  margin-top: 200px;
}
h1{
    font-weight:100;
    font-size:70px;
    color:#6bbe4c;
}

#partners{
  text-align: left;
}
#partners li{
  font-weight: normal;
  color:#000;
  margin-left: 20px;
}

</style>
<body>
<div id="container">
<?php
require_once("../bootstrap.php");
if(isset($_POST['type']) && $_POST['type'] == "team"){
    $team = new Team($_POST['email'],(isset($_POST['partner']) && $_POST['partner'] != "needed"));
    $entityManager->persist($team);
    $entityManager->flush();
    if(isset($_POST['partner']) && $_POST['partner'] == "needed"){
      ?>
      <h1>Finde deinen Teampartner!</h1>
      <p>Hier findest du eine Liste mit Menschen, die ebenfalls einen Teampartner suchen. Schreibt euch einfach mal an!<br>
        <strong>Wenn ihr euch gefunden habt meldet euch bite per Mail an!</strong>
      </p><br>
        <ul id="partners">
          <?php
          require_once("../bootstrap.php");
          $partners = Team::getFreePartners($entityManager);
          foreach($partners as $partner){
                      echo "<li>" . $partner->getEmail() . "</li>";
          }
          ?>
      </ul>
      <?
    }
    else
      echo "<h1>Erfolgreich Angemeldet</h1>Wir werden uns bald bei dir per Mail melden, um alles Weitere zu besprechen.";
}
else if(isset($_POST['type']) && $_POST['type'] == "reservation"){
    $reservation = new Reservierung($_POST['email'],$_POST['number']);
    $entityManager->persist($reservation);
    $entityManager->flush();
    echo "<h1>Erfolgreich Reserviert</h1>Wir freuen uns auf dich!";
}
else{
 echo "<h1>Fehler</h1>Es ist ein Fehler Aufgetreten. Bitte versuch es erneut!";
}
?>
</div>
</body>
</html>
