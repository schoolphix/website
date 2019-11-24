<?
require_once("functions.php");
session_destroy();//Then destroy all sessions
$nextURL = "login?logout=true";
header("Location: ". $nextURL);
exit;
?>