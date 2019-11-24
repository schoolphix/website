<?
require_once("functions.php");
if(isset($_GET['id']))
{
connectAppDB();

$id = $_GET['id'];
$query = "SELECT filename, filetype, filesize, filepath FROM applications WHERE id = '$id'";
$result = mysql_query($query) or die('Error, query failed');
list($name, $type, $size, $filePath) = mysql_fetch_array($result);

header("Content-Disposition: attachment; filename=$name");
header("Content-length: $size");
header("Content-type: $type");

readfile($filePath);

exit;
}
?>