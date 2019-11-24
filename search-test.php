<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<?php

/** 
 * 
 * @highlight words 
 * 
 * @param string $string 
 * 
 * @param array $words 
 * 
 * @return string 
 * 
 */
 function highlightWords($string, $words)
 {
    foreach ( $words as $word )
    {
        $string = str_ireplace($word, '<span class="highlight_word">'.$word.'</span>', $string);
    }
    /*** return the highlighted string ***/
    return $string;
 }

/*** example usage ***/
$string = 'This text will highlight PHP and SQL and sql but not PHPRO or MySQL or sqlite';
/*** an array of words to highlight ***/
$words = array('php', 'sql');
/*** highlight the words ***/
$string =  highlightWords($string, $words);


echo "FIRST METHOD<BR>";

?>



<style type="text/css">
.highlight_word{
    background-color: pink;
}
</style> 
 <?php echo $string; ?>



</body>
</html>