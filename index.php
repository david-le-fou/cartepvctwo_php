<?php
$texte = "{{{**david (bx)}}}";
function reg1($texte){
    $reg1 = '/{{{\*++(.+)}}}/Uims';
    $reg2 = '/\{\{\{(.+)\}\}\}/Uims';
    preg_match_all($reg1,$texte,$out);
    if(isset($out)){
        foreach($out[0] as $k =>$v){
            $font = mb_substr_count($out[0][$k],'*') +1;
            $text_reg1 = $out[1][$k];
            $pattern = array('/\?/Uims','/\(/Uims','/\)/Uims');
            $replace = array('\?','\(','\)');
            $text_reg = preg_replace($pattern,$replace, $text_reg1);//remplacer le caracter (?) par (\?) pour eviter le bug
            $reg_1 = "/\{\{\{\*++($text_reg)\}\}\}/Uims";
            $texte = preg_replace($reg_1,"<h$font class='inter_$font'>$text_reg1</h$font>",$texte);       
        }    
    }
    preg_match_all($reg2,$texte,$out);
    if(isset($out)){
        $texte = preg_replace($reg2,"<h$niveau1 class='inter_titre_font_0'>$1</h$niveau1>",$texte);
    }
    print_r($texte);
}
reg1("{{{**david (bx)}}}");
    reg1("{{{****Chaînages verticaux (cv)}}}");