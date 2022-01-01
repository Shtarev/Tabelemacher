    // определение языка или русский или немецкий
    var userLang = navigator.language || navigator.userLanguage;
    var userLang_detected = userLang.toLowerCase();
    if (userLang_detected != 'ru-ru' && userLang_detected != 'ru') {
        document.title = 'MySQL Tabellen erstellen';
        document.getElementById('titleschrift').innerHTML = '<h3>Eine Tabelle in MySQL erstellen</h3><i>Die MySQL-Datenbank muss vorhanden sein</i>';
        document.getElementById('dbhost').placeholder = "Datenbank Server";
        document.getElementById('dbname').placeholder = "Datenbank Name";
        document.getElementById('dbuser').placeholder = "Datenbank Benutzername";
        document.getElementById('dbpass').placeholder = "Datenbank Passwort";
        document.getElementById('tname').placeholder = "Name der Tabelle";
        document.getElementById('menge').placeholder = "Anzahl der Datensätze";
        document.getElementById('imgDir').placeholder = "Image Directory";
        document.getElementById('bildformat').innerHTML = "Bildformat (px)";
        document.getElementById('imgWidth').placeholder = "Breite";
        document.getElementById('imgHeight').placeholder = "Höhe";
        document.getElementById('knopf').value = "Tabelle Installieren";
        document.getElementById('language').value = userLang_detected;
        
        var instruction = "Instruction:";
        var dbhost = "Die von Ihrem Provider zugewiesene Serveradresse.<br>Tragen Sie der Hostname Ihrer Datenbank ein.<br>Sehr oft der als '<i>localhost</i> ' geschrieben wird.";
        var dbname = "Tragen Sie der Name Ihrer Datenbank ein. Die Datenbank wird nicht automatisch erstellt und muss zu diesem Zeitpunkt bereits vorhanden sein.";
        var dbuser = "Schreiben Sie hier Ihr Datenbank-Benutzername.";
        var dbpass = "Ihr Datenbank-Passwort.";
        var tname = "Erdenken und schreiben Sie in die Zeile der Name Ihrer Tabelle ein.<br>Im Namen können Sie alle Zeichen verwenden außer:<br>Slash - ' / ' oder Punkt - ' . '<br>Ebenso ist der Name nur aus Zahlen unmöglich: <strike>1234567</strike>";
        var menge = "Tragen Sie ein wie gross wird Ihre Tabelle.<br>Wie viele Zeilen die enthalten werden.";
        var imgDir = "Der weg bis zum Ordner vom Foto.<br>Der Weg rechnen Sie von Stammordner Ihrer Homepage.<br>Schreiben Sie den Slash bei anfang nicht.<br>Zum Beispiel:<br>Für Angular schaffen Sie Ordner 'images' im Directory 'assets', dann der Weg wird:</i><br>project/src/assets/images</i>";
        var imgWidth = "Tragen Sie gewunschene Bildbreite ein.<br><font color='#FF0000'>Schreiben Sie hier nur die Zahlen!</font><br>Es wird in den Pixels bestimmt.";
        var imgHeight = "Tragen Sie gewunschene Bildhöhe ein.<br><font color='#FF0000'>Schreiben Sie hier nur die Zahlen!</font><br>Es wird in den Pixels bestimmt.";
    }
    else {
        document.title = 'Генератор MySQL таблицы';
        document.getElementById('titleschrift').innerHTML = '<h3>Создание таблицы с данными</h3><i>MySQL-База должна существовать</i>';
        document.getElementById('dbhost').placeholder = "Хост базы";
        document.getElementById('dbname').placeholder = "Название базы";
        document.getElementById('dbuser').placeholder = "Пользователь базы";
        document.getElementById('dbpass').placeholder = "Пароль базы";
        document.getElementById('tname').placeholder = "Название для таблицы";
        document.getElementById('menge').placeholder = "Кол-во колонок в таблице";
        document.getElementById('imgDir').placeholder = "Директория для фото";
        document.getElementById('bildformat').innerHTML = "Размеры для фото в пикселях";
        document.getElementById('imgWidth').placeholder = "Ширина";
        document.getElementById('imgHeight').placeholder = "Высота";
        document.getElementById('knopf').value = "Создать таблицу";
        document.getElementById('language').value = userLang_detected;
        
        var instruction = "Инструкция:";
        var dbhost = "Введите название хоста вашей базы данных.<br>Часто бывает, что это '<i>localhost</i>'";
        var dbname = "Введите название существующей базы данных в которой будет создана таблица.<br>База данных не создается автоматически и на данный момент должна уже существовать.";
        var dbuser = "Введите имя пользователя базы данных.<br>Имя пользователя не создается автоматически и на данный момент уже должно существовать.";
        var dbpass = "Введите пароль для базы данных.<br>Пароль для не создается автоматически и на данный момент уже должен существовать.";
        var tname = "Придумайте и впишите название для создаваемой таблицы.<br>В названии вы можете использовать латинские буквы, а так же любые символы кроме:<br>Слэша - ' / ' или точки - ' . '<br>Так же нельзя использовать только цифры: <strike>1234567</strike>";
        var menge = "Подумайте, насколько дольшой будет ваша таблица.<br>Введите цифрой, сколько содать в таблице колонок.<br>Помните, что большое количество колонок потребует большее количество времени для их создания.";
        var imgDir = "Путь до папки в которую будут загружены изображения.<br>Путь до папки с изображениями прописывается от корневой директории.<br>Не пишите здесь путь начиная со слеша<hr><b>Пример-1:</b><br>Если вы хотите для изображений создать папку 'images' в корне сайта, тогда вы должны вписать путь:</i><br>images</i><br><br><b>Пример-2:</b><br>Если вы хотите для изображений создать папку 'images' в директории 'project/src/assets', тогда вы должны вписать путь:</i><br>project/src/assets/images</i>";
        var imgWidth = "Ширина изображений, которые будут созданы.<br><font color='#FF0000'>Пишите здесь только числа!</font><br>Введенная цифра будет принята как ширина изображения в пикселях.";
        var imgHeight = "Высота изображений, которые будут созданы.<br><font color='#FF0000'>Пишите здесь только числа!</font><br>Введенная цифра будет принята как высота изображения в пикселях.";
    }
    
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
    
        switch (id) {
          case 'dbhost':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>"+instruction+"</b></center><hr>"+dbhost+"</div>";
            break;
          case 'dbname':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>"+instruction+"</b></center><hr>"+dbname+"</div>";
            break;
          case 'dbuser':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>"+instruction+"</b></center><hr>"+dbuser+"</div>";
            break;
          case 'dbpass':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>"+instruction+"</b></center><hr>"+dbpass+"</div>";
            break;
          case 'tname':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>"+instruction+"</b></center><hr>"+tname+"</div>";
            break;
          case 'menge':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>"+instruction+"</b></center><hr>"+menge+"</div>";
            break;
          case 'imgDir':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>"+instruction+"</b></center><hr>"+imgDir+"</div>";
            break;
          case 'imgWidth':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>"+instruction+"</b></center><hr>"+imgWidth+"</div>";
            break;
          case 'imgHeight':
            document.getElementById('vorsagen').innerHTML = "<div class='vorsagen'><center><b>"+instruction+"</b></center><hr>"+imgHeight+"</div>";
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
