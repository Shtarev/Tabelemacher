<?php
/*Заполнение таблицы данными*/
namespace classes;
use classes\loremIpsum as loremContent;

class tabelleAusfuellen {
    public function tabelleSchafen($anschluss, $tname, $imgDir, $width, $height, $menge){
        // устанавливаем время работы PHP-скрипта т.к. размер таблицы может быть большой
        set_time_limit($menge);
        for($count = 0; $count < $menge; $count++){
            // Артикул 
                for($i = 0, $artikel = "", $letter = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; $i<8; $i++){
                    if($i<4){
                        $artikel = $artikel.$letter[rand(0, 25)];
                    }
                    else{
                        $artikel = $artikel.rand(0, 25);
                    }
                }
            // Создание Титле и ключа для стикера изображения
            switch(rand(0, 5)){
                case 0:
                    $title = "Hemd";
                    $stickerKey = 0;
                    break;
                case 1:
                    $title = "Jeans";
                    $stickerKey = 1;
                    break;
                case 2:
                    $title = "Kappe";
                    $stickerKey = 2;
                    break;
                case 3:
                    $title = "Socke";
                    $stickerKey = 3;
                    break;
                case 4:
                    $title = "T-Shirt";
                    $stickerKey = 4;
                    break;
                case 5:
                    $title = "Unterkleidung";
                    $stickerKey = 5;
                    break;
            }
            // Выбор щвета и ключа для круга под стикер изображения
            switch(rand(0, 3)){
                case 0:
                    $color = "Rot";
                    $colorKey = 0;
                    break;
                case 1:
                    $color = "Blau";
                    $colorKey = 1;
                    break;
                case 2:
                    $color = "Gelb";
                    $colorKey = 2;
                    break;
                case 3:
                    $color = "Gruen";
                    $colorKey = 3;
                    break;
            }
            // Выбор пола
            $mannFrau = array("Mann", "Frau");
            $geschlecht = $mannFrau[rand(0, 1)];
            // Выбор размера
            $grosseArray = array("M", "S", "L", "XL", "XXL");
            $grosse = $grosseArray[rand(0, 4)];
            // количество
            $anzahl = rand(0, 500);
            // Цена
            $kosten = rand(50, 1500);
            // Описание
            $beshreibung = loremContent::textSchafen(50, 200);
            $text = "<p>".loremContent::textSchafen(200, 600)."</p><p>".loremContent::textSchafen(100, 300)."</p><p>".loremContent::textSchafen(300, 700)."</p>";
            // Делаем изображение
            $pic = uniqid().".png"; // уникальное название изображения будет внесено в базу
            $imgName = "/".$imgDir."/".$pic; // уникальное название изображения + папка куда изображение будет сохранено
            $img = imagecreatetruecolor($width, $height); // создаем матрицу изображения
            /* ЦВЕТ - иннициализируем цвета */
            $white = imagecolorallocate( $img, 255, 255, 255 );
            $black = imagecolorallocate( $img, 0, 0, 0 );
            $bgColor = imagecolorallocate( $img, 211, 211, 211 ); // цвет подложки
            // массив цветов для круга
            $rot = imagecolorallocate( $img, 220, 20, 60 );
            $blau = imagecolorallocate( $img, 173, 216, 230 );
            $gelb = imagecolorallocate( $img, 240, 230, 140 );
            $gruen = imagecolorallocate( $img, 0, 128, 0 );
            $kreisColorArray = array($rot,$blau,$gelb,$gruen);
            // выбираем цвет круга
            $kreisColor = $kreisColorArray[$colorKey]; // ключь выбран при в фуеуции colorKey()

            // Получаем в массиве все стикеры
            $dirName = "sticker"; // папка со стикером
            $stickerWahl = glob($dirName."/*.png"); // в массиве все png-файлы из директории
            // выбираем стикер
            $sticker = $stickerWahl[$stickerKey]; // ключь выбран при в фуеуции titlesStickerKey()

            /* ЗДЕСЬ ДЕЛАЕМ САМО ИЗОБРАЖЕНИЕ */
            imagefilledrectangle( $img, 0, 0, $width, $height, $bgColor ); // заполненный цветом прямоугольник 

            /* Начинаем вставку стикера на изображение */
            $stickerWidth = getimagesize($sticker)[0]; // ширина стикера
            $stickerHeight = getimagesize($sticker)[1]; // высота стикера
            $stickerWidthNew = 45;
            $stickerHeightNew = 55;

            // переделываем-подгоняем стикер под основное изображение
            // вычисляем диаметр круга для стикера это диагональ переделаного стикера и
            // это же и ширина или высота основного изображения-зависит от его ориентации
            $durchmesser; // прописываем здесь диаметр круга, чтоб был в глобальной видимости
            $d = sqrt(pow($stickerWidth, 2) + pow($stickerHeight, 2)); // реальная диагональ стикера
            // if ориентация основного изображения горизонтальная else - вертикальная
            if($width >= $height){
                $durchmesser = $height; // задаем диаметр круга
                if($d > $height){
                    $differenz = $d - $height; // разница между реальной диагональю и которой надо
                    $differenzProzent = 100 / $d * $differenz; // узнаем сколько эта разница будет в %
                                                        // на столько же процентом уменьшаем стороны сткера
                    // уменьшеная ширина стикера
                    $tmp = $stickerWidth / 100 * $differenzProzent;
                    $stickerWidthNew = $stickerWidth - $tmp;
                    // уменьшеная высота стикера
                    $tmp = $stickerHeight / 100 * $differenzProzent;
                    $stickerHeightNew = $stickerHeight - $tmp;
                } // по аналогии наоборот если диагональ меньше высоты основного изображения
                elseif($height > $d){
                    $differenz = $height - $d;
                    $differenzProzent = 100 / $d * $differenz;

                    $tmp = $stickerWidth / 100 * $differenzProzent;
                    $stickerWidthNew = $stickerWidth + $tmp;
                    $tmp = $stickerHeight / 100 * $differenzProzent;
                    $stickerHeightNew = $stickerHeight + $tmp;
                }
            }
            else{
                //stikerNeue($d, $width, $stickerWidth, $stickerHeight);
                $durchmesser = $width; // задаем диаметр круга
                if($d > $width){
                    $differenz = $d - $width; // разница между реальной диагональю и которой надо
                    $differenzProzent = 100 / $d * $differenz; // узнаем сколько эта разница будет в %
                                                        // на столько же процентом уменьшаем стороны сткера
                    // уменьшеная ширина стикера
                    $tmp = $stickerWidth / 100 * $differenzProzent;
                    $stickerWidthNew = $stickerWidth - $tmp;
                    // уменьшеная высота стикера
                    $tmp = $stickerHeight / 100 * $differenzProzent;
                    $stickerHeightNew = $stickerHeight - $tmp;
                } // по аналогии наоборот если диагональ меньше высоты основного изображения
                elseif($width > $d){
                    $differenz = $width - $d;
                    $differenzProzent = 100 / $d * $differenz;

                    $tmp = $stickerWidth / 100 * $differenzProzent;
                    $stickerWidthNew = $stickerWidth + $tmp;
                    $tmp = $stickerHeight / 100 * $differenzProzent;
                    $stickerHeightNew = $stickerHeight + $tmp;
                }
            }
            /*вставляем круг*/
            imagefilledellipse ($img, $width/2, $height/2, $durchmesser , $durchmesser , $kreisColor);

            /*вставляем стикер*/
            $sticker = imagecreatefrompng($sticker); // создаем матрицу изображения стикера
            $positionX = ($width-$stickerWidthNew)/2; // позиция размещения стикера на подложке по X
            $positionY = ($height-$stickerHeightNew)/2; // позиция размещения стикера на подложке по Y
            imagecopyresized($img, $sticker, $positionX, $positionY, 0, 0, $stickerWidthNew, $stickerHeightNew, $stickerWidth, $stickerHeight);

            imagepng( $img, $_SERVER['DOCUMENT_ROOT'].$imgName ); // делаем png-изображение в директории указанной для изображений
            imagedestroy( $img ); // уничтожаем матрицу изображения
            $img = $imgName;

            $anschluss->query("INSERT INTO ".$tname." (artikel, title, geschlecht, beshreibung, text, img, color, grosse, anzahl, kosten) VALUES('$artikel', '$title', '$geschlecht', '$beshreibung', '$text', '$pic', '$color', '$grosse', '$anzahl', '$kosten')");
        }
        header( 'Location: '.$_SERVER['HTTP_REFERER'] ); // уходим на страницу с формой
    }
}