<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<?php

/**
 * @highlight words
 *
 * @param string $text
 *
 * @param array $words
 *
 * @param array $colors
 *
 * @return string
 *
 */
function highlightWords($text, $words, $colors=null)
{
        if(is_null($colors) || !is_array($colors))
        {
                $colors = array('yellow', 'pink', 'green');
        }

        $i = 0;
        /*** the maximum key number ***/
        $num_colors = max(array_keys($colors));

        /*** loop of the array of words ***/
        foreach ($words as $word)
        {
                /*** quote the text for regex ***/
                $word = preg_quote($word);
                /*** highlight the words ***/
                $text = preg_replace("/\b($word)\b/i", '<span class="highlight_'.$colors[$i].'">\1</span>', $text);
                if($i==$num_colors){ $i = 0; } else { $i++; }
        }
        /*** return the text ***/
        return $text;
}


/*** example usage ***/
$string = 'This text will highlight PHP and SQL and sql but not PHPRO or MySQL or sqlite';
$words = array('php', 'sql', 'phpro', 'sqlite');
$string =  highlightWords($string, $words);

?>

<style type="text/css">
.highlight_pink{
        background-color: pink;
}
.highlight_yellow{
        background-color: yellow;
}
.highlight_green{
        background-color: green;
}
</style>

<?php echo $string; ?>
</body>
</html>