<!DOCTYPE html>
<html>
<head>
    <!-- hier roep ik mijn stylesheets aan, waaronder een buttonbibliotheek en mijn css bestand-->
    <title>betermelden</title>
    <link rel="stylesheet" href="periode1.4.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span><div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="leerlingoverzicht.php">Leerlingoverzicht</a><br>
    <a href="leerlingtoevoegen.php">leerlingtoevoegen</a><br>
    <a href="ziekenoverzicht.php">Ziekenoverzicht</a><br>
    <a href="ziekmelding.php">Ziekmelden</a><br>
    <a href="betermelding.php">Betermelden</a><br>
</div><br>
<h1><em>Meld je hier ziek</em></h1>
<form method="post" name="veranderen">
    <p><b>Naam:<br/></b><INPUT TYPE="text" name="naam"/></P>
    <P><b>Klas:<br/></b><INPUT TYPE="text" name="klas"/></P>
    <p><b>Mentor:<br/></b><INPUT TYPE="text" name="mentor"/></P>
    <p><b>Datum ziek gemeld:<br/></b><INPUT TYPE="date" name="ziek"/></p>
        <p><b>Dag ziekgemeld:</b></p>
        <input type="checkbox" id="maandag" name="dag" value="maandag">
        <label for="maandag"> Maandag</label><br>
        <input type="checkbox" id="dinsdag" name="dag" value="dinsdag">
        <label for="dinsdag"> Dinsdag</label><br>
        <input type="checkbox" id="woensdag" name="dag" value="woensdag">
        <label for="woensdag"> Woensdag</label><br>
        <input type="checkbox" id="donderdag" name="dag" value="donderdag">
        <label for="donderdag"> Donderdag</label><br>
        <input type="checkbox" id="vrijdag" name="dag" value="vrijdag">
        <label for="vrijdag"> Vrijdag</label><br><br>
    <button class="w3-button w3-circle w3-teal" type="submit" name="btnAdd">Meld je hier ziek</button>
</FORM>
<!--hier laat ik een butten zien, als er iemand op klikt wordt hij verwezen naar de overzicht pagina-->
<button onclick="myFunction()">Ga naar de ziekenlijst</button>

<script>
    function myFunction() {
        location.replace("ziekenoverzicht.php")
    }
</script>
    <!-- Hier maak ik de connectie met mijn database, en wijzig of voeg ik de data in de database als er op een knop is gedrukt-->
<?php
    include 'config.php';
    if(isset($_POST["btnAdd"])) {

        $lijst = array();

            $lijst[0] = $_POST["naam"];

            $lijst[1] = $_POST["klas"];

            $lijst[2] =  $_POST["mentor"];

            $lijst[3] = $_POST["ziek"];

            $lijst[4] = $_POST["dag"];


        $query = "INSERT INTO ziekeleerlingen VALUES ".
            "('$lijst[0]','$lijst[1]','$lijst[2]','$lijst[3]','$lijst[4]')";
        $stm = $con->prepare($query);
        if($stm->execute())
        {
            echo "Leerling is ziekgemeld!";
        }else echo "Leerling is niet ziekgemeld!";
    }
    ?>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
</body>
</html>