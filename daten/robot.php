<?php
session_start();
function __autoload( $className ) {
    include __NAMESPACE__.$className.".php";
}
use classes\tabelleAusfuellen as ausfuellen;

if(isset($_POST['dbhost'])){$dbhost=$_POST['dbhost'];}
if(isset($_POST['dbname'])){$dbname=$_POST['dbname'];}
if(isset($_POST['dbuser'])){$dbuser=$_POST['dbuser'];}
if(isset($_POST['dbpass'])){$dbpass=$_POST['dbpass'];}
if(isset($_POST['tname'])){$tname=$_POST['tname'];}
if(isset($_POST['menge'])){$menge=$_POST['menge'];}
if(isset($_POST['imgDir'])){$imgDir=$_POST['imgDir'];}
if(isset($_POST['imgWidth'])){$width=$_POST['imgWidth'];}
if(isset($_POST['imgHeight'])){$height=$_POST['imgHeight'];}
if(isset($_POST['instal'])){$_SESSION['mitteilung']="<div class='vorsagen'><font color='#006600'>Die Tabelle war geschafft</font></div>";}

if($dbhost==""){inSession(); $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>Die Zeile \"Datenbank Server\" war nicht ausgefüllt.<br>Tragen Sie bitte der Hostname Ihrer Datenbank ein.</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));}
if($dbname==""){inSession(); $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>Die Zeile \"Datenbank Name\" war nicht ausgefüllt.<br>Tragen Sie bitte der Name Ihrer Datenbank ein.</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));}
if($dbuser==""){inSession(); $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>Die Zeile \"Datenbank Benutzername\" war nicht ausgefüllt.<br>Tragen Sie bitte Ihr Datenbank-Benutzername.</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));}
if($dbpass==""){
    if($dbuser != "root"){
        inSession(); $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>Die Zeile \"Datenbank Passwort\" war nicht ausgefüllt.<br>Tragen Sie bitte Ihr Datenbank-Passwort.</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));
    }
}
if($tname==""){inSession(); $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>Die Zeile \"Name der Tabelle\" war nicht ausgefüllt.<br>Erdenken und schreiben Sie in die Zeile der Name Ihrer Tabelle ein.</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));}
if(strpos($tname, "/")!=false){inSession(); $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>Die Zeile \"Name der Tabelle\" war nicht richtig ausgefüllt.<br>Im Tabellenamen können Sie nicht Slash - ' / ' verwenden.</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));}
if(strpos($tname, ".")!=false){inSession(); $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>Die Zeile \"Name der Tabelle\" war nicht richtig ausgefüllt.<br>Im Tabellenamen können Sie nicht Punkt - ' . ' verwenden.</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));}
if(is_numeric($tname)==true){inSession(); $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>Die Zeile \"Name der Tabelle\" war nicht richtig ausgefüllt.<br>Die Tabellenamen können Sie nicht nur mit Zahlen unmöglich schreiben.</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));}
if(is_numeric($menge)==false){inSession(); $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>Die Zeile \"Anzahl der Datensätze\" war nicht richtig ausgefüllt.<br>Diese können Sie nur mit Zahlen schreiben.</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));}
if($menge==""){inSession(); $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>Die Zeile \"Anzahl der Datensätze\" war nicht ausgefüllt.<br>Tragen Sie ein wie gross wird Ihre Tabelle.<br>Wie viele Zeilen die enthalten werden.</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));}
if($imgDir==""){inSession(); $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>Die Zeile \"Image Directory\" war nicht ausgefüllt.<br>Schreiben Sie den Weg bis zum Ordner für Foto.</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));}
if($width==""){inSession(); $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>Die Zeile \"Breite\" war nicht ausgefüllt.<br>Erdenken und schreiben Sie in die Zeile der Name Ihrer Tabelle ein.</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));}
if(is_numeric($width)==false){inSession(); $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>Die Zeile \"Breite\" war nicht richtig ausgefüllt.<br>Diese können Sie nur mit Zahlen schreiben.</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));}
if($height==""){inSession(); $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>Die Zeile \"Höhe\" war nicht ausgefüllt.<br>Erdenken und schreiben Sie in die Zeile der Name Ihrer Tabelle ein.</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));}
if(is_numeric($height)==false){inSession(); $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>Die Zeile \"Höhe\" war nicht richtig ausgefüllt.<br>Diese können Sie nur mit Zahlen schreiben.</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));}

function inSession(){
    global $dbhost, $dbname, $dbuser, $tname, $menge, $imgDir, $width, $height;
    $_SESSION['dbhost']=$dbhost;
    $_SESSION['dbname']=$dbname;
    $_SESSION['dbuser']=$dbuser;
    $_SESSION['tname']=$tname;
    $_SESSION['menge']=$menge;
    $_SESSION['imgDir']=$imgDir;
    $_SESSION['imgWidth']=$width;
    $_SESSION['imgHeight']=$height;
}
// Создание соединения
$anschluss = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Проверка соединения
if ($anschluss->connect_error) {
    inSession();
    $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>MySql-Fehler.<br>Falsch verbunden: " . $anschluss->connect_error."</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));
}

// Создание таблицы
$sql = "CREATE TABLE ".$tname." (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artikel VARCHAR(255) NOT NULL,
title VARCHAR(255) NOT NULL,
geschlecht VARCHAR(10) NOT NULL,
beshreibung TEXT NOT NULL,
text TEXT NOT NULL,
img VARCHAR(255) NOT NULL,
color VARCHAR(255) NOT NULL,
grosse VARCHAR(255) NOT NULL,
anzahl INT(10) NOT NULL,
kosten INT(10) NOT NULL
)";
if ($anschluss->query($sql) === TRUE) { // создаем таблицу и если она создана
    // Заполняем таблицу данными
    ausfuellen::tabelleSchafen($anschluss, $tname, $imgDir, $width, $height, $menge);
} else {
    $_SESSION['mitteilung']="<div class=\"warnung\"><center><b>Warnung:</b></center><hr>MySql-Fehler.<br>Die Tabelle war nicht geschafft:<br>". $anschluss->error."</div>"; die(header( 'Location: '.$_SERVER['HTTP_REFERER'] ));
}
// Закрыть подключение
$anschluss->close();