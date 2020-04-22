<!DOCTYPE html>
<html>
<head>
    <!-- hier roep ik mijn stylesheets aan, waaronder een buttonbibliotheek en mijn css bestand-->
    <title>ziekenoverzicht</title>
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
    <a href="ziekenoverzicht.php">Ziekenoverzicht</a><br>
    <a href="ziekmelding.php">Ziekmelden</a><br>
    <a href="betermelding.php">Betermelden</a><br>
</div><br>
<?php
include 'config.php';
$query = "SELECT * FROM ziekeleerlingen WHERE dag= 'vrijdag'";
$stm = $con->prepare($query);

if ($stm->execute());
{
    $result = $stm->fetchAll(PDO::FETCH_OBJ);

    foreach ($result as $pers)
    {

        echo "Meld hier de leerling beter!: <a href=betermelding.php>$pers->naam </a><br/><br>";
        echo "Leerlingen: "."<br/>";
        echo "Naam:";
        echo $pers->naam ."<br/>";
        echo "Klas: ";
        echo $pers->klas . "<br/>";
        echo "Mentor: ";
        echo $pers->mentor . "<br/>";
        echo "Datum ziekmelding: ";
        echo $pers->beter . "<br/>";
        echo "Dag ziekmelding: ";
        echo $pers->dag . "<br/>";
        echo "<hr width=\"15%\">";
    }
}
?>
<button onclick="myFunction1()">Ga naar het ziekenoverzicht</button>

<script>
    function myFunction1() {
        location.replace("ziekenoverzicht.php")
    }
</script><br>
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
