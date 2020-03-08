<?php
session_start();
if(isset($_SESSION['dbhost'])){$dbhost=$_SESSION['dbhost'];}else{$dbhost="";}
if(isset($_SESSION['dbname'])){$dbname=$_SESSION['dbname'];}else{$dbname="";}
if(isset($_SESSION['dbuser'])){$dbuser=$_SESSION['dbuser'];}else{$dbuser="";}
if(isset($_SESSION['tname'])){$tname=$_SESSION['tname'];}else{$tname="";}
if(isset($_SESSION['menge'])){$menge=$_SESSION['menge'];}else{$menge="";}
if(isset($_SESSION['imgDir'])){$imgDir=$_SESSION['imgDir'];}else{$imgDir="";}
if(isset($_SESSION['imgWidth'])){$imgWidth=$_SESSION['imgWidth'];}else{$imgWidth="";}
if(isset($_SESSION['imgHeight'])){$imgHeight=$_SESSION['imgHeight'];}else{$imgHeight="";}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MySQL Tabellen erstellen</title>
<script type="text/javascript" src="daten/js/jquery.min.js"></script>
<link href="daten/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="infoZeigen">
    <div id="infoNone">X</div>
    <b>KURZBESCHREIBUNG</b><br>
    Nach dem Sie alle Zeile auffühlen werden, bekommen Sie dann eine Tabelle für MySQL Datenbank, die so Gross wird wie Sie wünschen. Aber denken Sie daran, dass eine Tabelle die mehr als 1000 Tabelleneintragungen hat, benötigt mehr Zeit für Installierung und Installierungprozess kann mehr als eine Minute dauern.<br>
    Zeigen Sie den rechten Weg zum Ordner wo die Bilder(Foto) sich befinden sollen, weil gerade in dieser Ordner die Bilder installieren werden.<br>
    Jede Eintragung hat seine eigene ID, Foto, beschreibung, usw. Am Ende der Installation die Tabelle soll etwas so aussehen:
    <img src="daten/tabelle.jpg" />
    Copyright © Andrey Shtarev.<br>
    Das Skript ist Freiheitsgewährende Software, es bedeuted: Sie können das kostenlos und ohne Beschränkungen zu verwenden.<br>
    Falls Sie eine Fehler bei Skriptarbeit finden, können Sie darüber per E-Mail: a.shtarev@gmail mitteilen.
</div>
<div id="vorsagen"></div>
<center>
<div id="mitteilung">
    <?php
    if($_SERVER['HTTP_REFERER']){
        if(isset($_SESSION['mitteilung'])){
            echo $_SESSION['mitteilung'];
        }
    }
    ?>
</div>

    <h3>Eine Tabelle in MySQL erstellen</h3>
    <form action="daten/robot.php" method="post">
        <input type="text" name="dbhost" id="dbhost" value="<?=$dbhost?>" placeholder="Datenbank Server" />
        <input type="text" name="dbname" id="dbname" value="<?=$dbname?>" placeholder="Datenbank Name" />
        <input type="text" name="dbuser" id="dbuser" value="<?=$dbuser?>" placeholder="Datenbank Benutzername" />
        <input type="text" name="dbpass" id="dbpass" value="<?=$dbpass?>" placeholder="Datenbank Passwort" />
        <input type="text" name="tname" id="tname" value="<?=$tname?>" placeholder="Name der Tabelle" />
        <input type="text" name="menge" id="menge" value="<?=$menge?>" placeholder="Anzahl der Datensätze" />
        <input type="text" name="imgDir" id="imgDir" value="<?=$imgDir?>" placeholder="Image Directory" />
        <h5>Bildformat (px)</h5>
        <input type="text" name="imgWidth" id="imgWidth" value="<?=$imgWidth?>" placeholder="Breite" /> X
        <input type="text" name="imgHeight" id="imgHeight" value="<?=$imgHeight?>" placeholder="Höhe" />
        <br>
        <input type="submit" name="instal" onClick="foo()" id="knopf" value="Tabelle Installieren" />
    </form>
</center>
<footer>
    Copyright © 2010<script>new Date().getFullYear()>2010&&document.write("-"+new Date().getFullYear());</script> | Freiheitsgewährende Software | Design & programmierung by<br>Andrey Shtarev<br><a href="" id="info" onClick="return false;">Mehr Infotmation</a>
</footer>
<script type="text/javascript" src="daten/js/jsScript.js"></script>
</body>
</html>
<?php session_destroy();?>