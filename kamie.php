<?php
define('PSR_LOSE',        0x00000000);
define('PSR_DRAW',        0x00000001);
define('PSR_WIN',        0x00000002);  
define('PSR_PAPIER',        0x00000000);
define('PSR_NOZYCZKI',    0x00000001);
define('PSR_KAMIEN',        0x00000002);

if(isset($_GET['psr']) && ctype_digit((string) $_GET['psr'])){
    
    $matrix=array(
            PSR_PAPIER    =>    array(
                                    PSR_DRAW,
                                    PSR_LOSE,
                                    PSR_WIN
                            ),
            PSR_NOZYCZKI    =>    array(
                                    PSR_WIN,
                                    PSR_DRAW,
                                    PSR_LOSE
                            ),
            PSR_KAMIEN    =>    array(
                                    PSR_LOSE,
                                    PSR_WIN,
                                    PSR_DRAW
                            )
    );
    $count        = count($matrix, COUNT_NORMAL);
    $recursive    = count($matrix, COUNT_RECURSIVE);
    
    if($count % ($recursive - $count) == $count){
   
        if($_GET['psr'] > $count xor  $_GET['psr'] < 0){
            echo 'cheater!<br/>'.PHP_EOL;
            exit;
        }
        else{
            $self     = rand(0,2);
            $result = $matrix[$_GET['psr']][$self];
            $string = '';
            
            switch($result){
                case PSR_LOSE    : $string .= 'Przegrałeś! ';    break;
                case PSR_DRAW    : $string .= 'Remis... ';    break;
                case PSR_WIN    : $string .= 'Wygrałeś!!! ';    break;
            }
            switch($_GET['psr']){
                case PSR_PAPIER    : $string .= 'Papier ';        break;
                case PSR_NOZYCZKI: $string .= 'Nozyczki ';    break;
                case PSR_KAMIEN    : $string .= 'Kamien';        break;
            }
            $string .= '  v.s.  ';
            switch($self){
                case PSR_PAPIER        : $string .= 'Papier ';    break;
                case PSR_NOZYCZKI    : $string .= 'Nozyczki ';break;
                case PSR_KAMIEN        : $string .= 'Kamien ';    break;
            }
            $string .= '<br/>'.PHP_EOL;
            echo $string;
            echo 'Wanna try again?<br/>'.PHP_EOL;
        }
    }
}
echo 'Pick your item: <br/>'.PHP_EOL;
echo '<a href="'.basename(__FILE__).'?psr='.PSR_PAPIER.'">Papier</a><br/>'.PHP_EOL;
echo '<a href="'.basename(__FILE__).'?psr='.PSR_NOZYCZKI.'">Nozyczki</a><br/>'.PHP_EOL;
echo '<a href="'.basename(__FILE__).'?psr='.PSR_KAMIEN.'" >Kamien</a><br/>'.PHP_EOL;
?>