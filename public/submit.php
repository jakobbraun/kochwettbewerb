<?php
if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
  header("Location: index.html");
  exit;
}
?>
<html>
<meta charset="utf-8">
<title>Kochwettbewerb</title>
<style>
@font-face {
  font-family: 'SourceSansPro';
  font-style: light;
  font-weight: 100;
  src: local('SourceSansPro'), url(SourceSansPro-Light.ttf);
}

body {
    background:#fafafa;
    text-align:center;
    padding-top:100px;
    font-family:SourceSansPro;
}

h1{
    font-weight:100;
    font-size:70px;
    color:#6bbe4c;
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
