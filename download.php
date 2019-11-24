<?

if(isset($_GET['id'])){//First check to see if file name is set
	$picturename = $_GET['id']; //Specify directory where file is saved
	if (file_exists($picturename)){//Check if any such file exist
		$itema = ".pdf";  $itemb = ".txt";  $itemc = ".text";//Define possible download formats,...pdf,txt,text,rar,zip,tar,tgz,tar.gz
		$itemd = ".zip";  $iteme = ".tar";  $itemf = ".tgz"; $itemg = ".tar.gz"; $itemh = ".doc";
		$name = $picturename;
		if(preg_match("/$itema\$/i", $name)) {
			$myattach = 'application/pdf';
		}elseif(preg_match("/$itemb\$/i", $name)){
			$myattach = 'text/plain';
		}elseif(preg_match("/$itemc\$/i", $name)){
			$myattach = 'text/plain';
		}elseif(preg_match("/$itemd\$/i", $name)){
			$myattach = 'application/zip';
		}elseif(preg_match("/$iteme\$/i", $name)){
			$myattach = 'application/x - tar';
		}elseif(preg_match("/$itemf\$/i", $name)){
			$myattach = 'application/x - tgz';
		}elseif(preg_match("/$itemg\$/i", $name)){
			$myattach = 'application/x - tgz';
		}elseif(preg_match("/$itemh\$/i", $name)){
			$myattach = 'application/msword';
		}elseif(preg_match("/$itemi\$/i", $name)){
			$myattach = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
		}
		//open/save dialog box  
		header('Content-Disposition: attachment; filename="'.$name.'"');
		//content type
		header('Content-type: '.$myattach);
		//read from server and write to buffer
		readfile($picturename);
	}else{//Redirect user to same page with error message set to indicate no such file found
		$_SESSION['falsedownload'] = 'wrong';
	}
	
}
?>
