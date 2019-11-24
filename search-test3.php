<?php

/**
 * @highlight words
 *
 * @param string $text
 *
 * @param array $words
 *
 * @return string
 *
 */
function highlightWords($text, $words)
{
        /*** loop of the array of words ***/
        foreach ($words as $word)
        {
                /*** quote the text for regex ***/
                $word = preg_quote($word);
                /*** highlight the words ***/
                $text = preg_replace("/\b($word)\b/i", '<span class="highlight_word">\1</span>', $text);
        }
        /*** return the text ***/
        return $text;
}


/*** example usage ***/
$string = 'This text will highlight PHP and SQL and sql but not PHPRO or MySQL or sqlite';
/*** an array of words to highlight ***/
$words = array('php', 'sql');
/*** highlight the words ***/
$string =  highlightWords($string, $words);

?>

<html>
<head>
<title>PHPRO Highlight Search Words</title>
<style type="text/css">
.highlight_word{
        background-color: pink;
}
</style>
</head>
<body>
 <?php echo $string; ?>
</body>
</html>