<?php
/*
* Генератор текста Lorem Ipsum. В аргументах - длинна текста:
* $von = минимальная, $bis = максимальная
*/
namespace classes;

class loremIpsum {
    public static function textSchafen($von, $bis){
        if($von > $bis) {
            echo('<center style="background-color: bisque"><hr><font color="#FF0000"><b>Fehler</b> in Datei:<br>'.debug_backtrace()[0]['file'].'<br>in Zeile: '.debug_backtrace()[0]['line'].'</font>');
            return '***<br><font color="#006600">loremIpsum($von, $bis)<br>loremIpsum('.$von.', '.$bis.')<br>Argument <b>$von</b> kann nicht mehr als Argument <b>$bis</b> sein.</font><hr></center>';
            }
        if ($bis > 1684) {$bis = 1684;}
        if ($von > 1684) {$von = 1684;}

        $loremIpsum = "sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt neque porro quisquam est qui dolorem ipsum quia dolor sit amet consectetur adipisci velit sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem ut enim ad minima veniam quis nostrum exercitationem ullam corporis suscipit laboriosam nisi ut aliquid ex ea commodi consequatur quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur vel illum qui dolorem eum fugiat quo voluptas nulla pariatur at vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint obcaecati cupiditate non provident similique sunt in culpa qui officia deserunt mollitia animi id est laborum et dolorum fuga et harum quidem rerum facilis est et expedita distinctio nam libero tempore cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus omnis voluptas assumenda est omnis dolor repellendus temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae itaque earum rerum hic tenetur a sapiente delectus ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat";
        $langLoremIpsum =  strlen($loremIpsum);

        $langPhraseSoll = rand($von, $bis);
        $anfangPhrase = rand(0, $langLoremIpsum-$langPhraseSoll);
        if($loremIpsum[$anfangPhrase] == " "){
            $anfangPhrase = $anfangPhrase - 1;
        }
        $phrase = ucfirst(substr($loremIpsum, $anfangPhrase, $langPhraseSoll)).".";
        if($bis <= 15){
            return $phrase;
        }
        else{
            $langPhraseIst = strlen($phrase);
            $punkt = rand(15, 70);

            for($i = $punkt; $i < $langPhraseIst; $i=$punkt){
                if($phrase[$punkt] != " "){
                    while($phrase[$punkt] != " "){
                        $punkt = $punkt-1;
                    }
                }
                $phrase[$punkt] = ".";
                $buk = $phrase[$punkt+1];
                $phrase[$punkt+1] = strtoupper($buk);

                for($j = $langPhraseIst-2; $j > $punkt+1; $j--){
                    $phrase[$j] = $phrase[$j-1];
                }
                $phrase[$punkt+1] = " ";

                $punkt = rand($punkt+15, $punkt+50);
            }
            if($phrase[$langPhraseIst-2] == " "){
                $phrase[$langPhraseIst-2] = ".";
                return $phrase.".";
            }
            else{
                return $phrase;
            }
        }
    }
}