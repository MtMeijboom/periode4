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
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="leerlingoverzicht.php">Leerlingoverzicht</a><br>
    <a href="leerlingtoevoegen.php">leerlingtoevoegen</a><br>
    <a href="ziekenoverzicht.php">Ziekenoverzicht</a><br>
    <a href="ziekmelding.php">Ziekmelden</a><br>
    <a href="betermelding.php">Betermelden</a><br>
</div><br>
<h1><em>Meld je hier beter</em></h1>
<form method="post" name="veranderen">
    <p><b>Naam:<br/></b><INPUT TYPE="text" name="naam"/></P>
    <P><b>Klas:<br/></b><INPUT TYPE="text" name="klas"/></P>
    <p><b>Mentor:<br/></b><INPUT TYPE="text" name="mentor"/></P>
    <p><b>Datum beter gemeld:<br/></b><INPUT TYPE="date" name="beter"/></p>
    <button class="w3-button w3-circle w3-teal" type="submit" name="btnAdd">Meld je hier beter</button>
</FORM>
<!--hier laat ik een butten zien, als er iemand op klikt wordt hij verwezen naar de cv pagina-->
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

        $naam=$_POST["naam"];
        $adres=$_POST["klas"];
        $postcode=$_POST["mentor"];
        $woonplaats=$_POST["beter"];

        $query="DELETE FROM ziekeleerlingen WHERE naam = '$naam'";
        $stm = $con->prepare($query);
        if($stm->execute())
        {
            echo "Leerling is betergemeld!!";
        }else echo "Leerling is niet betergemeld!";

    }


    ?>
</font>
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