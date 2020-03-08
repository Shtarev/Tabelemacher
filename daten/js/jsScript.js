    // событие при наведении мыши на поле input
    $('input').on('mouseover', function(){
        ausgabe(this.id);
    });
    // событие при убирании мыши с поля input
    $('input').on('mouseout',function(){
        document.getElementById('vorsagen').innerHTML = ""; // чтобы при отводе мыши подсказка исчезла
    });
    // функция вывода подсказки по полям
    function ausgabe(id){
      var dbhost = "Die von Ihrem Provider zugewiesene Serveradresse.<br>Tragen Sie der Hostname Ihrer Datenbank ein.<br>Sehr oft der als '<i>localhost</i> ' geschrieben wird.";
        var dbname = "Tragen Sie der Name Ihrer Datenbank ein.";
        var dbuser = "Schreiben Sie hier Ihr Datenbank-Benutzername.";
        var dbpass = "Ihr Datenbank-Passwort.";
        var tname = "Erdenken und schreiben Sie in die Zeile der Name Ihrer Tabelle ein.<br>Im Namen können Sie alle Zeichen verwenden außer:<br>Slash - ' / ' oder Punkt - ' . '<br>Ebenso ist der Name nur aus Zahlen unmöglich: <strike>1234567</strike>";
        var menge = "Tragen Sie ein wie gross wird Ihre Tabelle.<br>Wie viele Zeilen die enthalten werden.";
        var imgDir = "Der weg bis zum Ordner vom Foto.<br>Der Weg rechnen Sie von Stammordner Ihrer Homepage.<br>Schreiben Sie den Slash bei anfang nicht.<br>Zum Beispiel:<br>Für Angular schaffen Sie Ordner 'images' im Directory 'assets', dann der Weg wird:</i><br>project/src/assets/images</i>";
        var imgWidth = "Tragen Sie gewunschene Bildbreite ein.<br><font color='#FF0000'>Schreiben Sie hier nur die Zahlen!</font><br>Es wird in den Pixels bestimmt.";
        var imgHeight = "Tragen Sie gewunschene Bildhöhe ein.<br><font color='#FF0000'>Schreiben Sie hier nur die Zahlen!</font><br>Es wird in den Pixels bestimmt.";
        switch (id) {
          case 'dbhost':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>Instruction:</b></center><hr>"+dbhost+"</div>";
            break;
          case 'dbname':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>Instruction:</b></center><hr>"+dbname+"</div>";
            break;
          case 'dbuser':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>Instruction:</b></center><hr>"+dbuser+"</div>";
            break;
          case 'dbpass':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>Instruction:</b></center><hr>"+dbpass+"</div>";
            break;
          case 'tname':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>Instruction:</b></center><hr>"+tname+"</div>";
            break;
          case 'menge':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>Instruction:</b></center><hr>"+menge+"</div>";
            break;
          case 'imgDir':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>Instruction:</b></center><hr>"+imgDir+"</div>";
            break;
          case 'imgWidth':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>Instruction:</b></center><hr>"+imgWidth+"</div>";
            break;
          case 'imgHeight':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>Instruction:</b></center><hr>"+imgHeight+"</div>";
            break;
        }
    }
    
    // показать инфо
    $("#info").click(function(){

        $("#infoZeigen").animate({'opacity': '0.5'})
                        .animate({'width': '97%'})
                        .animate({'fontSize': '25px'})
                        .animate({'opacity': '1'})
        $("#infoNone").animate({'width': '30px'})
                      .animate({'height': '30px'})
                      .animate({'fontSize': '20px'})
                      .animate({'opacity': '1'})
    });
    // скрыть инфо
    $("#infoNone").click(function(){
        $("#infoZeigen").animate({'fontSize': '2px'})
                        .animate({'width': '10%'})
                        .animate({'opacity': '0'})
        $("#infoNone").animate({'fontSize': '2px'})
                      .animate({'width': '2px'})
                      .animate({'height': '2px'})
                      .animate({'opacity': '0'})
    });
    // при нажатии кнопки инсталировать
    function foo(){
        document.getElementById('mitteilung').innerHTML = "<div class='vorsagen'><b>Bitte:</b> Haben Sie etwas geduld...<br><progress max='10' value='0'></progress></div>";
        document.getElementById('knopf').style.pointerEvents = "none"; // делаем кнопку инсталяции неактивной(на случай если кому взбредет в голову нажать еще раз)
        document.getElementById('knopf').style.color = "gray";

        var i = 0; // будет счетчиком секунд
        var j = 0; // будет счетчиком 10-и секундых проходов
        setInterval(function () {
            if(i >= 10) { // на 10-ой секунде  
                document.querySelector("progress").value = 10;
                i = 0;
                j++;
                if(j == 3){
                    document.getElementById('mitteilung').innerHTML = "<div class='vorsagen'><b>Bitte:</b> Haben Sie etwas geduld.<br>Es wird gleich fertig.<br><progress max='10' value='0'></progress></div>";
                }
                if(j == 6){
                    document.getElementById('mitteilung').innerHTML = "<div class='vorsagen'><b>Bitte:</b> Haben Sie etwas geduld.<br>Es wird gleich fertig.<br>Große Tabellen brauchen mehr Zeit für Installierung.<br><progress max='10' value='0'></progress></div>";
                }
            }
                else {
                document.querySelector("progress").value = i;
                i++;
            }
        }, 1000); // запуск функции каждую секунду
    }