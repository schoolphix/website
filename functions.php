<?php

session_start();
date_default_timezone_set('Africa/Lagos');

function connectAppDB() {
    $dbhost = 'localhost';
    $dbuser = 'nucoscho_user01';//christhi_user01
    $dbpassword = 'nucoscho_pass.01.admin';//christ.hill.pass01
	$connect = @mysql_connect($dbhost, $dbuser, $dbpassword);//using @ to suppress any possible error that may arise from using this function
    if(!$connect) {
        die('Connection failed: ' . mysql_error());
        return false;
    }
    //select a apecific DB/Schema
    $dbname = 'nucoscho_database';//christhi_database
    mysql_select_db($dbname,$connect);
    if(!mysql_select_db($dbname)) {
        die('Selected database unavailable: ' . mysql_error());
        return false;
    }
    return $connect;
}
function getCleanString($input){
	$clean = mysql_real_escape_string(trim($input));
	return $clean;
}
function getDateTime() {
    $format = "Y-m-d H:i:s";
    $today =  date($format);
    return $today;
}
function mustLogin($type="user"){
	if(!isset($_SESSION['wtsession'])){
		header("Location: login?login=false");
		exit;
	}else{
		if($type=="ADMIN"){//limited to only admin
			if($_SESSION['wtsession']->usertype!="ADMIN"){
				header("Location: login?login=false-admin");
				exit;
			}
		}
	}
}
function getContactMessageById($cid){
	connectAppDB();
	$query = "SELECT a.* FROM contactus a WHERE a.id ='".$cid."' LIMIT 1";
	$result = mysql_query($query);
	if(mysql_num_rows($result) == 0){
		$myresult = 0;		
	}else{
		$myresult = mysql_fetch_array($result);
	}		
	return $myresult;	
}
function christime($date){
    if(empty($date)) {
        return "No date provided";
    }
 
    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60","60","24","7","4.35","12","10");
 
    $now = time();
    $unix_date = strtotime($date);
 
   // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }
 
    // is it future date or past date
    if($now > $unix_date) {    
        $difference = $now - $unix_date;
        $tense = "ago";
 
    } else {
        $difference = $unix_date - $now;
        $tense = "from now";
    }
 
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
 
    $difference = round($difference);
 
    if($difference != 1) {
        $periods[$j].= "s";
    }
 
    return "$difference $periods[$j] {$tense}";
}
function getPictureCount($fid){
	connectAppDB();
	$query = "SELECT COUNT(id) FROM gallerypicures WHERE folderid = '".$fid."'";
	//echo $query;
	$result = mysql_query($query);
	list($piccount) = mysql_fetch_array($result);
	return $piccount;
}
function pagination($query, $per_page = 10,$page = 1, $url){  
	$query = "SELECT COUNT(*) as `num` FROM {$query}";
	$row = mysql_fetch_array(mysql_query($query));
	$total = $row['num'];
	$adjacents = "2"; 

	$page = ($page == 0 ? 1 : $page);  
	$start = ($page - 1) * $per_page;								
	
	$prev = $page - 1;							
	$next = $page + 1;
	$lastpage = ceil($total/$per_page);
	$lpm1 = $lastpage - 1;
	
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<ul class='pagination'>";
				$pagination .= "<li class='details'>Page $page of $lastpage</li>";
		if ($lastpage < 7 + ($adjacents * 2))
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li><a class='current'>$counter</a></li>";
				else
					$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))
		{
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><a class='current'>$counter</a></li>";
					else
						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
				}
				$pagination.= "<li class='dot'>...</li>";
				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		
			}
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
				$pagination.= "<li class='dot'>...</li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><a class='current'>$counter</a></li>";
					else
						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
				}
				$pagination.= "<li class='dot'>..</li>";
				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		
			}
			else
			{
				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
				$pagination.= "<li class='dot'>..</li>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><a class='current'>$counter</a></li>";
					else
						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
				}
			}
		}
		
		if ($page < $counter - 1){ 
			$pagination.= "<li><a href='{$url}page=$next'>Next</a></li>";
			$pagination.= "<li><a href='{$url}page=$lastpage'>Last</a></li>";
		}else{
			$pagination.= "<li><a class='current'>Next</a></li>";
			$pagination.= "<li><a class='current'>Last</a></li>";
		}
		$pagination.= "</ul>\n";		
	}

	return $pagination;
} 
function limitWords($string, $word_limit){
	$words = explode(" ",$string);
	return implode(" ", array_splice($words, 0, $word_limit
	));
}
function getPictures($id,$offset,$pagelimit){
	connectAppDB();//id, filename, userid, uploadtype
	$query = "SELECT * FROM gallerypicures WHERE folderid = '".$id."' ORDER BY id DESC LIMIT ".getCleanString($offset).", ".getCleanString($pagelimit);
	//echo $query;
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) == 0){
		$myresult = 0;		
	}else{
		$myresult = $result;
	}		
	
	return $myresult;
}
function getAllPictureFolders(){
	connectAppDB();
	$query = "SELECT a.* FROM picfolder a ORDER BY a.id DESC";
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) == 0){
		$myresult = 0;		
	}else{
		$myresult = $result;
	}		
	
	return $myresult;
}
function getCarouselById($fid){
	connectAppDB();
	$query = "SELECT a.* FROM carousel a
	WHERE a.id = '".getCleanString($fid)."' LIMIT 1";
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) == 0){
		$myresult = 0;		
	}else{
		$myresult = mysql_fetch_array($result);
	}		
	
	return $myresult;
}
function getTestimonyById($fid){
	connectAppDB();
	$query = "SELECT a.* FROM testimonies a
	WHERE a.sn = '".getCleanString($fid)."' LIMIT 1";
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) == 0){
		$myresult = 0;		
	}else{
		$myresult = mysql_fetch_array($result);
	}		
	
	return $myresult;
}
function getFolderById($fid){
	connectAppDB();
	$query = "SELECT a.*, b.usernames as 'createby' FROM picfolder a, adminuser b 
				WHERE a.id = '".getCleanString($fid)."' AND a.createdby = b.id LIMIT 1";
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) == 0){
		$myresult = 0;		
	}else{
		$myresult = mysql_fetch_array($result);
	}		
	
	return $myresult;
}
function getJobById($fid){
	connectAppDB();
	$query = "SELECT a.*, b.usernames as 'createby' FROM careers a, adminuser b 
				WHERE a.id = '".getCleanString($fid)."' AND a.createdby = b.id LIMIT 1";
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) == 0){
		$myresult = 0;		
	}else{
		$myresult = mysql_fetch_array($result);
	}		
	
	return $myresult;
}
function getNewsById($fid){
	connectAppDB();
	$query = "SELECT a.*, b.usernames as 'createby'
	 FROM adminupdate a, adminuser b 
	WHERE a.id = '".getCleanString($fid)."' 
	AND a.userid = b.id LIMIT 1";
	
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) == 0){
		$myresult = 0;		
	}else{
		$myresult = mysql_fetch_array($result);
	}		
	
	return $myresult;
}
function getMorePageDetails($field,$id){
	connectAppDB();
	$query = "SELECT a.* FROM morepages a
	WHERE a.".getCleanString($field)." = '".getCleanString($id)."' LIMIT 1";
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) == 0){
		$myresult = 0;		
	}else{
		$myresult = mysql_fetch_array($result);
	}		
	
	return $myresult;
}
function sendEmailNotice($to,$subject,$message,$web_data="",$attach=""){
	require_once("mailer/class.phpmailer.php");	
	$mail = new PHPMailer();
	
	//$mail->IsSMTP();                                      // set mailer to use SMTP
	$mail->Host = "localhost";  // specify main and backup server
	$mail->SMTPAuth = true;     // turn on SMTP authentication
	//password: info_pass_01
	$mail->From = $web_data['School_Email'];
	$mail->FromName = "Admin@".$web_data['School_Name'];
	$mail->AddAddress($to);
	
	$mail->WordWrap = 50;                                 // set word wrap to 50 characters

	$mail->IsHTML(true);                                  // set email format to HTML
	$message = $message."
	<br /><br />Best Regards,
	<br />The Director
	<br />".$web_data['School_Name']."
	<br />".$web_data['School_Phone'];
	
	$mail->Subject = $subject;
	$mail->Body    = "
<table align='center' style='width:70%;' cellpadding='10' cellspacing='10'>
   <tr>
	  <td style='background: #3993ba;background: -moz-linear-gradient(top, #3993ba 0%, #3993ba 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#3993ba), color-stop(100%,#3993ba));background: -webkit-linear-gradient(top, #3993ba 0%,#067ead 100%);background: -o-linear-gradient(top, #3993ba 0%,#3993ba 100%);background: -ms-linear-gradient(top, #3993ba 0%,#067ead 100%);background: linear-gradient(top, #067ead 0%,#3993ba 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#067ead', endColorstr='#3993ba',GradientType=0 );color:#FFFFFF;'>	  
		<img alt='".$web_data['School_Name']." Logo' src='".$web_data['School_Website']."/".$web_data['School_Logo']."'> ".$web_data['School_Name']."
	  </td>
	</tr>
	<tr>
	  <td align='left' style='font-family:Tahoma, Geneva, sans-serif;font-size:13px;color:#414141'>".$message."</td>
	</tr>
	<tr>
	  <td align='left'><hr></hr></td>
	</tr>
	<tr>
	  <td align='left' style='font-family:Tahoma, Geneva, sans-serif;font-size:11px;color:grey'>
	  	This message was sent to ".$to." courtesy of ".$web_data['School_Name'].".<br>
		<a style='color:#4c7cbd' href='".$web_data['School_Website']."'>".$web_data['School_Name']."</a>
		&copy; ".date('Y')."	  
	  </td>
	</tr>
</table>		
	";
	//echo $mail->Body; exit;
	@$mail->Send();//send email	
	
}
function navigation ($offset,$page,$total_rows,$url){	
	if ($offset > 0){// if we're not on the first record, we can always go backwards	
			echo  "<a id='submit' title='click to view previous entries' href='".($page.$url)."offset=".($offset-PAGE_LIMIT)."'><em><b>&lt;&lt;Previous</b></em></a> &nbsp; ";
	}
	if ($offset+PAGE_LIMIT < $total_rows){
			echo  "<a id='submit' title='click to view next entries' href='".($page.$url)."offset=".($offset+PAGE_LIMIT)."'><em><b>Next &gt;&gt;</b></em></a>&nbsp;";
	}	
}
function justUpload($fileformat,$directory,$width,$height,$type){
	$upload="false";
	$uerr = checkUploadedFile($fileformat);
	
	if($uerr==""||$uerr==NULL||empty($uerr)){
		$file_name = $_FILES['photo']['name'];				 
		$file_name = date("Ymd").'_'.time().".".strtolower(getExtension($file_name));

		$picturename = $directory."/" . $file_name;
		
		if(!is_dir($directory)){
			if(!mkdir($directory, 0777, TRUE)){
			}
		} 
		
		if($width==""&&$height==""){
			move_uploaded_file ($_FILES['photo']['tmp_name'], $picturename);
		}else{			
			$resizewidth = $width;
			$resizeheight = $height;
			uploadImageResize($resizewidth,$resizeheight,$picturename,$type);
		}
		//echo $picturename;exit;			
		$return['upload']="true";			 
		$return['picturename']=$picturename;			 
	}
	return($return);
}
function checkUploadedFile($fileformat){
 	$uerr = NULL;
    try {
		
        if (!array_key_exists('photo', $_FILES)) {
			$uerr ="FILENOTFOUND";
            throw new Exception('File not found in uploaded data');
        }
 
        $image = $_FILES['photo'];
		$file_name = $_FILES['photo']['name'];
 
        // ensure the file was successfully uploaded
        assertValidUpload($image['error']);
 
        if (!is_uploaded_file($image['tmp_name'])) {
			$uerr ="FILENOTUPLOADED";
            throw new Exception('File is not an uploaded file');
        }
 
        $allowable = $fileformat;// CHECK FILE FORMAT	
		$mytype = end(explode('.',strtolower($file_name)));//becos in_array is case sensitive
 		//echo "<pre>".print_r($allowable)."</pre>"; exit;
        if (!in_array($mytype,$allowable)) {
			$uerr ="FILEFORMATNOTALLOWED";
            throw new Exception('Uploaded file format not supported');
        }
        if ($image['size'] > (5*1024*1024)) {
			$uerr ="FILESIZETOOBIG";
            throw new Exception('Maximum file upload of 5MB exceeded');
        }

    }
    catch (Exception $ex) {
        $_SESSION['imageerrors'][] = $ex->getMessage();
		$_SESSION['alerterror'] = "true";
    }
	return $uerr;
}
function assertValidUpload($code)
{
	if ($code == UPLOAD_ERR_OK) {
		return;
	}

	switch ($code) {
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			$msg = 'Image is too large';
			break;

		case UPLOAD_ERR_PARTIAL:
			$msg = 'Image was only partially uploaded';
			break;

		case UPLOAD_ERR_NO_FILE:
			$msg = 'No image was uploaded';
			break;

		case UPLOAD_ERR_NO_TMP_DIR:
			$msg = 'Upload folder not found';
			break;

		case UPLOAD_ERR_CANT_WRITE:
			$msg = 'Unable to write uploaded file';
			break;

		case UPLOAD_ERR_EXTENSION:
			$msg = 'Upload failed due to extension';
			break;

		default:
			$msg = 'Unknown error';
	}

	throw new Exception($msg);
}
function uploadFile($id,$mode,$fileformat){
	$uerr = checkUploadedFile($fileformat);
	$u = $_SESSION['wtsession'];
	if ($uerr == "" || $uerr == NULL || empty($uerr)) {//if error flag was not set

		 $file_name = $_FILES['photo']['name'];

		 $file_name = date("Ymd").'_'.time().".".strtolower(getExtension($file_name));//generate a random name for picture file
		if($mode=="schoolfile"){
			$directory = "fileuploads";
			$file_name = $_FILES['photo']['name'];
		}elseif($mode=="jobapplication"){
			$directory = "jobapplication";
		}elseif($mode=="album"){
			$directory = "albums";
		}
		 
		 $picturename = $directory."/" . $file_name; 
		 
		if(!is_dir($directory)){//If folder does not exist before, attempt to create it
			if(!mkdir($directory, 0777, TRUE)){//If it does not create echo to user
			}
		}   //even if folder does not exist before, it does now
		 
			
		if($mode=="schoolfile"){

		$updateupload = mysql_query("UPDATE uploads SET filedir = '".$picturename."' WHERE id = '".$id."'"); 	
		
		
		move_uploaded_file ($_FILES['photo']['tmp_name'], $picturename);

		}elseif($mode=="jobapplication"){
		 
		 $updateupload = mysql_query("UPDATE uploads SET filedir = '".$picturename."' WHERE id = '".$id."'"); 	
		
		 move_uploaded_file ($_FILES['photo']['tmp_name'], $picturename);

		}elseif($mode=="album"){
		
		$updateupload = mysql_query("UPDATE gallerypicures SET imagedirectory = '".$picturename."' WHERE id = '".$id."'"); 	
			$resizewidth = 750;
			$resizeheight = "";

			uploadImageResize($resizewidth,$resizeheight,$picturename);

		}

		$result = 1;
	}
	return $result;	
}
function uploadImageResize($resizewidth,$resizeheight,$directorypath,$default="gallery"){

	try{	
		$filename = stripslashes($_FILES['photo']['name']);
		$extension = getExtension($filename);
		$extension = strtolower($extension);
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
			throw new Exception("Only pjpeg, jpeg, gif and png picture file formats are allowed");
		}else{
			$size=filesize($_FILES['photo']['tmp_name']);
			if($extension=="jpg" || $extension=="jpeg" ){
				$uploadedfile = $_FILES['photo']['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);
			}else if($extension=="png"){		
					$uploadedfile = $_FILES['photo']['tmp_name'];
					$src = imagecreatefrompng($uploadedfile);
			}else {
				$src = imagecreatefromgif($uploadedfile);
			}
	
			list($width,$height)=getimagesize($uploadedfile);
				
			// SET VALUE FOR NEW WIDTH
			if($default=="gallery"){//for gallery and yearbook pictures, check for resize
				if($width>$height){
					$newwidth=$resizewidth;//set width of picture to be created
					$newheight=($height/$width)*$newwidth;//calculate and set the new height			
				}else{
					$newwidth=450;//if height is greater than the width, default to 450
					$newheight=($height/$width)*$newwidth;//calculate and set the new height
				}			
			}elseif($default=="logo"){
				
				$newwidth=$width;//set default width
				if($resizewidth!=""){
					$newwidth=$resizewidth;
				}
				
				$newheight=($height/$width)*$newwidth;
				if($resizeheight!=""){
					$newheight=$resizeheight;
				}
				
			}elseif($default=="profilepic"){
				$newwidth=$resizewidth;//set width of picture to be created
				$newheight=($height/$width)*$newwidth;//calculate and set the new height									
			}
			
			
			$tmp=imagecreatetruecolor($newwidth,$newheight);

			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			

			$filename = $directorypath;
						
			imagejpeg($tmp,$filename,75);
			//imagejpeg($tmp1,$filename1,100);
			
			imagedestroy($src);
			imagedestroy($tmp);
			//imagedestroy($tmp1);
			
			return( 1 );
		}
	}catch (Exception $ex) {
        $_SESSION['imageerrors'][] = $ex->getMessage();
		$_SESSION['alerterror'] = "true";
    }
}

function getExtension($str) {

	 $i = strrpos($str,".");
	 if (!$i) { return ""; } 

	 $l = strlen($str) - $i;
	 $ext = substr($str,$i+1,$l);
	 return $ext;
}
function getWebsiteData(){
	connectAppDB();
	$query = "SELECT a.* FROM settings a";
	$result = mysql_query($query);
	if(mysql_num_rows($result) == 0){
		$mydata = 0;		
	}else{
		while(@$record = mysql_fetch_array($result)){
			$mydata[$record['caption']]=$record['content'];
		}
	}		

	//get all social media links
	$social=array();
	$query = "SELECT a.* FROM socialmedia a";
	$result = mysql_query($query);
	if(mysql_num_rows($result) == 0){
		$mydata = 0;		
	}else{
		$i=0;
		while(@$record = mysql_fetch_array($result)){
			$social[$i][0] = $record['caption'];
			$social[$i][1] = $record['medialink'];
			$i++;
		}
	}		
	
	$mydata['Social_Media']=$social;
	
	return $mydata;	
}
function getAllLinks($mode=""){
	if($mode=="get_home_content"){
		$query = "SELECT a.* FROM morepages a 
		WHERE a.active_status = '1'";
	}else{
		$query = "SELECT a.caption, a.active_status,
		a.link_location, a.url_content, a.category
	FROM morepages a WHERE a.active_status = '1'";
	}
	//echo $query; exit;
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) == 0){
		$links = 0;		
	}else{
		$a =0;$ac =0;$ad =0;$m =0;$l =0;
		//for home page contents
		$t1a=0;$t1b=0;$t1c=0;$t1d=0;
		$t2=0;$t3=0;$t4=0;
		
		while(@$record = mysql_fetch_array($result)){
			if($record['category']=="about"){
				$about[$a][0] = $record['caption'];
				$about[$a][1] = $record['category'];
				$about[$a][2] = $record['url_content'];
				$a++;
			}
			if($record['category']=="academics"){
				$academics[$ac][0] = $record['caption'];
				$academics[$ac][1] = $record['category'];
				$academics[$ac][2] = $record['url_content'];
				$ac++;				
			}
			if($record['category']=="admission"){
				$admission[$ad][0] = $record['caption'];
				$admission[$ad][1] = $record['category'];
				$admission[$ad][2] = $record['url_content'];
				$ad++;				
			}
			if($record['category']=="more"){
				$more[$m][0] = $record['caption'];
				$more[$m][1] = $record['category'];
				$more[$m][2] = $record['url_content'];
				$m++;				
			}
			if($record['link_location']=="2"){
				$right[$l][0] = $record['caption'];
				$right[$l][1] = $record['category'];
				$right[$l][2] = $record['url_content'];
				$l++;								
			}
			if($mode=="get_home_content"){//landing page
				if($record['home_tab']=="1A"){
					$hometab1a[$t1a][0] = $record['caption'];
					$hometab1a[$t1a][1] = $record['picture_url'];
					$hometab1a[$t1a][2] = $record['content'];
					$hometab1a[$t1a][3] = $record['category'];
					$hometab1a[$t1a][4] = $record['url_content'];
					$t1a++;								
				}
				if($record['home_tab']=="1B"){
					$hometab1b[$t1b][0] = $record['caption'];
					$hometab1b[$t1b][1] = $record['picture_url'];
					$hometab1b[$t1b][2] = $record['content'];
					$hometab1b[$t1b][3] = $record['category'];
					$hometab1b[$t1b][4] = $record['url_content'];
					$t1b++;								
				}
				if($record['home_tab']=="1C"){
					$hometab1c[$t1c][0] = $record['caption'];
					$hometab1c[$t1c][1] = $record['picture_url'];
					$hometab1c[$t1c][2] = $record['content'];
					$hometab1c[$t1c][3] = $record['category'];
					$hometab1c[$t1c][4] = $record['url_content'];
					$t1c++;								
				}
				if($record['home_tab']=="1D"){
					$hometab1d[$t1d][0] = $record['caption'];
					$hometab1d[$t1d][1] = $record['picture_url'];
					$hometab1d[$t1d][2] = $record['content'];
					$hometab1d[$t1d][3] = $record['category'];
					$hometab1d[$t1d][4] = $record['url_content'];
					$t1d++;								
				}
				if($record['home_tab']=="2"){
					$hometab2[$t2][0] = $record['caption'];
					$hometab2[$t2][1] = $record['picture_url'];
					$hometab2[$t2][2] = $record['content'];
					$hometab2[$t2][3] = $record['category'];
					$hometab2[$t2][4] = $record['url_content'];
					$t2++;								
				}
				if($record['home_tab']=="3"){
					$hometab3[$t3][0] = $record['caption'];
					$hometab3[$t3][1] = $record['picture_url'];
					$hometab3[$t3][2] = $record['content'];
					$hometab3[$t3][3] = $record['category'];
					$hometab3[$t3][4] = $record['url_content'];
					$t3++;								
				}
				if($record['home_tab']=="4"){
					$hometab4[$t4][0] = $record['caption'];
					$hometab4[$t4][1] = $record['picture_url'];
					$hometab4[$t4][2] = $record['content'];
					$hometab4[$t4][3] = $record['category'];
					$hometab4[$t4][4] = $record['url_content'];
					$t4++;								
				}
			
			}	
			
			@$links->about = $about;
			@$links->academics = $academics;
			@$links->admission = $admission;
			@$links->more = $more;
			@$links->right = $right;
			
			if($mode=="get_home_content"){
				@$links->hometab1a = $hometab1a;
				@$links->hometab1b = $hometab1b;
				@$links->hometab1c = $hometab1c;
				@$links->hometab1d = $hometab1d;
				
				
				@$links->hometab2 = $hometab2;
				@$links->hometab3 = $hometab3;
				@$links->hometab4 = $hometab4;
			}

		}
	}	
	return $links;
}
function highlightWords($text, $words){
/*** loop of the array of words ***/
	foreach ($words as $word){
		/*** quote the text for regex ***/
		$word = preg_quote($word);
		/*** highlight the words ***/
		$text = preg_replace("/\b($word)\b/i", '<span class="highlight_word">\1</span>', $text);
	}
	/*** return the text ***/
	return $text;
}
function getCarouselPictures($status=""){
	connectAppDB();
	$add_status="";
	if($status!=""){
		$add_status="WHERE a.active_status=
		'".getCleanString($status)."'";
	}
	
	$query = "SELECT a.* FROM carousel a "
	.$add_status;

	$records = mysql_query($query);
	$cntrecords = mysql_num_rows($records);
	
	if($cntrecords == 0){
		$result->num = 0;	
		$result->data = "";	
	}else{
		@$result->num = $cntrecords;	
		$result->data = $records;	
	}		
	
	return $result;
}
function getSMSUrl($method,$smsuser,$smspass,$smscaption,$to,$message,$sendon){
	if($method=="compose"){
		$url= "http://login.smsphix.com/customer/api/?username=".$smsuser."&password=".$smspass."&message=".urlencode($message)."&sender=".$smscaption."&mobiles=".$to."";
		return($url);	
	}elseif($method=="check-credit"){
		$check= "http://login.smsphix.com/customer/api/?username=".$smsuser."&password=".$smspass."&request=balance";
		$result =  get_web_page($check);
		$code=$result['content'];
		if($code=="1701"){
			$msg="SMS Sent Successfully";
		}elseif($code=="1702"){
			$msg="Invalid URL Parameters";
		}elseif($code=="1703"){
			$msg="Invalid username/password combination";
		}elseif($code=="1704"){
			$msg="Credit exhausted";
		}elseif($code=="1705"){
			$msg="Mobile number too long (MAX.500)";
		}elseif($code=="1706"){
			$msg="Internal Error";
		}else{
			$msg="SMS Balance: N".$code;
		}
		return($msg);
	}	
}
function get_web_page( $url )
{
	$options = array(
		CURLOPT_RETURNTRANSFER => true,     // return web page
		CURLOPT_HEADER         => false,    // don't return headers
		CURLOPT_FOLLOWLOCATION => true,     // follow redirects
		CURLOPT_ENCODING       => "",       // handle compressed
		CURLOPT_USERAGENT      => "spider", // who am i
		CURLOPT_AUTOREFERER    => true,     // set referer on redirect
		CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
		CURLOPT_TIMEOUT        => 120,      // timeout on response
		CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
	);

	$ch      = curl_init( $url );
	curl_setopt_array( $ch, $options );
	$content = curl_exec( $ch );
	$err     = curl_errno( $ch );
	$errmsg  = curl_error( $ch );
	$header  = curl_getinfo( $ch );
	curl_close( $ch );

	$header['errno']   = $err;
	$header['errmsg']  = $errmsg;
	$header['content'] = $content;
	return $header;
}
function smsStatusMsg($code){
	if($code=="1701"){
		$msg="SMS Sent Successfully";
	}elseif($code=="1702"){
		$msg="Invalid URL Parameters";
	}elseif($code=="1703"){
		$msg="Invalid username/password combination";
	}elseif($code=="1704"){
		$msg="Credit exhausted";
	}elseif($code=="1705"){
		$msg="Mobile number too long (MAX.500)";
	}elseif($code=="1706"){
		$msg="Internal Error";
	}else{
		$msg=$code;
	}
	return($msg);
}