<?php
require_once("functions.php");

if(isset($_REQUEST['action'])) {
    $user_action = $_REQUEST['action'];
    $myresponse = "login";
	$_SESSION['error'] = array();

	if($user_action == 'contact-us')
       $myresponse = contactUs();
   	else if($user_action == 'login')
       $myresponse = login();
   	else if($user_action == 'password-update')
       $myresponse = passwordUpdate();
   	else if($user_action == 'setting-new')
       $myresponse = settingNew();
   	else if($user_action == 'upload-new')
       $myresponse = settingsUploadNew();
   	else if($user_action == 'save-settings')
       $myresponse = saveSettings();
   	else if($user_action == 'create-new-page')
       $myresponse = newPage();
   	else if($user_action == 'update-page-details')
       $myresponse = updatePageDetails();
   	else if($user_action == 'create-album')
       $myresponse = newPhotoAlbum();
	else if($user_action == 'create-new-job')
       $myresponse = newJob();
   	else if($user_action == 'update-album')
       $myresponse = updatePhotoAlbum();
	else if($user_action == 'update-job')
       $myresponse = updateJob();
   	else if($user_action == 'update-carousel')
       $myresponse = updateCarousel();
	else if($user_action == 'update-testimony')
       $myresponse = updateTestimony();
   	else if($user_action == 'upload-picture')
       $myresponse = uploadNewPicture();
   	else if($user_action == 'newsletter')
       $myresponse = newsLetterNew();
   	else if($user_action == 'send-sms')
       $myresponse = sendSMS();
   	else if($user_action == 'update-news')
       $myresponse = updateNews();
   	else if($user_action == 'social-media')
       $myresponse = socialMedia();
   	else if($user_action == 'upload-new-file')
       $myresponse = uploadNewFile();
   	else if($user_action == 'send-newsletter')
       $myresponse = sendNewsletter();
   	else if($user_action == 'search-site')
       $myresponse = searchSite();
   	else if($user_action == 'upload-carousel')
       $myresponse = uploadCarousel();
	else if($user_action == 'add-testimony')
       $myresponse = addTestimony();

	else if($user_action == 'delete-contact-message')
	   $myresponse =getDeleteMessages($table="contactus",$url="contact-messages",$field="id",$caption="message"); 	   
	else if($user_action == 'delete-page')
	   $myresponse =getDeleteMessages($table="morepages",$url="more-pages-list",$field="id",$caption="page"); 	   
	else if($user_action == 'delete-album')
	   $myresponse =getDeleteMessages($table="picfolder",$url="folder-list",$field="id",$caption="photo-album");	
	else if($user_action == 'delete-album-pictures')
	   $myresponse =getDeleteMessages($table="gallerypicures",$url="pictures-view?aid=".$_REQUEST['aid'],$field="id",$caption="album-picture"); 	   
	else if($user_action == 'delete-news')
	   $myresponse =getDeleteMessages($table="adminupdate",$url="content-list",$field="id",$caption="announcement"); 	   
	else if($user_action == 'delete-social-media')
	   $myresponse =getDeleteMessages($table="socialmedia",$url="social-media-list",$field="id",$caption="social media page"); 	   
	else if($user_action == 'delete-newsletter')
	   $myresponse =getDeleteMessages($table="newsletters",$url="newsletter-list",$field="id",$caption="newletter"); 
	   

	else if($user_action == 'delete-carousel')
	   $myresponse =getDeleteMessages($table="carousel",$url="carousel-list",$field="id",$caption="carousel picture"); 	   
	else if($user_action == 'delete-testimonies')
	   $myresponse =getDeleteMessages($table="testimonies",$url="testimonies-list",$field="sn",$caption="testimony"); 
	else if($user_action == 'delete-jobs')
	   $myresponse =getDeleteMessages($table="careers",$url="careers-list",$field="id",$caption="career"); 
	else if($user_action == 'delete-applications')
	   $myresponse =getDeleteMessages($table="applications",$url="applications-list?id=".$_REQUEST['jobid']."",$field="id",$caption="application"); 		 	      
  	
	header('Location: ' . $myresponse);//   
	exit;
}
function login(){
	try{
		connectAppDB();// COnnect to Database
		$nextURL = "login";
		$password = getCleanString($_REQUEST['password']);
		$email = getCleanString($_REQUEST['email']);
		if($email==""||$password==""){
			$_SESSION['error'][] = 'Please enter all required fields.';	
			$_SESSION['alertstyle'] = "alert";
		}else{
		$result = mysql_query("SELECT * FROM adminuser WHERE userid='".$email."' AND pass='".sha1($password)."' LIMIT 1");
			if(mysql_num_rows($result)>0){
				if(isset($_REQUEST['remember'])){
				setcookie('cookieuser',$email,time()+60*60*24*365);//set cookie life to 1 year
				setcookie('cookiepass',($password),time()+60*60*24*365);//set cookie life to 1 year  
			}
				$DB_row = mysql_fetch_array($result);
				
				@$u->id = $DB_row['id'];
				@$u->usernames = $DB_row['usernames'];
				@$u->usertype = $DB_row['usertype'];
				
				
				$_SESSION['wtsession']=$u;
				$nextURL = "cpanel-home";
			}else{
				$_SESSION['error'][] = 'Invalid Login Details.';			
			}
		}
	}catch(Exception $ex){
		$_SESSION['error'] = $ex->getMessage();
	}

    return $nextURL;
}
function passwordUpdate(){
	try{
		$u = $_SESSION['wtsession'];
		$con = connectAppDB();// COnnect to Database			
		$newpass = getCleanString($_REQUEST['newpass']);
		$newpasssecond = getCleanString($_REQUEST['newpasssecond']); 
		$currentpass = getCleanString($_REQUEST['oldpass']);
		//First of all, the 2 passwords must match

		if($_REQUEST['oldpass']==""||$_REQUEST['newpass']==""||$_REQUEST['newpasssecond']==""){
			$_SESSION['error'][] = 'Please enter all required fields.';	
			$_SESSION['alertstyle'] = "alert";
		}elseif ($_REQUEST['newpass'] != $_REQUEST['newpasssecond']){
			$_SESSION['error'][] = 'Your new passwords must match.';	
			$_SESSION['alertstyle'] = "alert";
		}else{			
			$check = "SELECT id FROM adminuser WHERE id = '".$u->id."' AND pass = '".sha1($currentpass)."'";			
			//echo $check; exit;
			$Query = mysql_query($check);

			if (mysql_num_rows($Query)>0){
				
				$updatestudent = mysql_query("UPDATE adminuser SET pass = '".sha1($newpass)."' 
				where id = '".$u->id."'");
				if ($updatestudent != ""){
					$_SESSION['divborder'] = "success";
					$_SESSION['error'][] = 'Your password updated successfully.';
				}else{
					$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
				}
			}else{// that is, password from DB differs from one from user, implying an imposter
				$_SESSION['error'][] = '&nbsp;You are not authorized to update this password.';
				$_SESSION['alertstyle'] = "alert";		
			}	
		}
		$nextURL = "password-update";
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}
		
    return $nextURL;		
}
function searchSite(){
	$nextURL = "search?q=".($_REQUEST['query']!=""?urlencode($_REQUEST['query']):"");
	return $nextURL;

}
function settingNew(){
	try{	
		connectAppDB();
		//content   caption
		$caption = getCleanString($_REQUEST['caption']);
		$content = getCleanString($_REQUEST['content']);
		$settingtype = getCleanString($_REQUEST['settingtype']);
		
		$u = $_SESSION['wtsession'];
		$nextURL = "setting-new";
			  
		if($_REQUEST['caption']==""){
			$_SESSION['error'][] = 'Please enter all required field';	
			$_SESSION['alertstyle'] = "alert";			
		}else{
		
			$chkcat = mysql_query("SELECT * FROM settings WHERE caption ='".$caption."'");
			if(mysql_num_rows($chkcat) > 0){

				$update = mysql_query("UPDATE settings SET content='".$content."' WHERE caption='".$caption."' LIMIT 1");
					
				if ($update != ""){
				$_SESSION['divborder'] = "success";			
				$_SESSION['error'][] = 'Database updated successfully.';				
					
				}else{	
					$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
				}

			}else{//New category name
				$insertcat = mysql_query("INSERT INTO settings (caption, content, datecreated, settingtype) VALUES
				('".$caption."','".$content."', '".date("Y-m-d H:i:s")."','".$settingtype."')");
					
				if ($insertcat != ""){
					$id = (int) mysql_insert_id();
				$_SESSION['divborder'] = "success";			
				$_SESSION['error'][] = 'New Setting was added successfully';				
					
				}else{	
					$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
				}
			}
		}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
	return $nextURL;
}
function settingsUploadNew(){
	try{	
		connectAppDB();
		//photo  content   width  height
		$caption = getCleanString($_REQUEST['caption']);
		$width = getCleanString($_REQUEST['width']);
		$height = getCleanString($_REQUEST['height']);
		
		$settingtype = getCleanString($_REQUEST['settingtype']);
		
		$u = $_SESSION['wtsession'];
		$nextURL = "setting-new";
		
		$success="false";
		$upload="false";
		
		if($_FILES['photo']['name'] == ""){		
			$_SESSION['error'][] = 'Please select a file to upload';	
			$_SESSION['alertstyle'] = "alert";			
		}else{
			//set parameters for upload
			$fileformat = array('jpg','jpeg','gif','png','ico');
			$directory = "asset/uploads";
			
			$upload = justUpload($fileformat,$directory,$width,$height,"logo");

			if($upload['upload']=="true"){
				//echo "got here";exit;
				$chkcat = mysql_query("SELECT * FROM settings WHERE caption ='".$caption."'");
				if(mysql_num_rows($chkcat) > 0){
	
					$chkimg = mysql_fetch_array($chkcat);
					if($chkimg['content'] != ""){			
						@unlink($chkimg['content']);
					}

					$update = mysql_query("UPDATE settings SET content='".$upload['picturename']."' WHERE caption='".$caption."' LIMIT 1");
					if ($update != ""){
						$success="true";			
					}
	
				}else{//New category name
					$insert = mysql_query("INSERT INTO settings (caption, content, datecreated, settingtype) VALUES
					('".$caption."','".$picturename."', '".date("Y-m-d H:i:s")."','".$settingtype."')");
						
					if ($insert != ""){
						$success="true";					
					}
				}
			}
			if ($success == "true"){
				//UPLOAD FILE
				$_SESSION['divborder'] = "success";			
				$_SESSION['error'][] = 'Database updated successfully';				
			}else{	
				$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
			}
		}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
	return $nextURL;
}
function updateNews(){
	try{
		$nextURL = "content-edit?id=".$_REQUEST['id'];		
		$_SESSION['error'] = array();
		
		if(trim($_REQUEST['caption'])==""||trim($_REQUEST['description'])==""){
			$_SESSION['error'][] = 'Please enter all required fields.';	
			$_SESSION['alertstyle'] = "alert";
		}else{
			connectAppDB();
			$caption = getCleanString($_REQUEST['caption']);
			$content = getCleanString($_REQUEST['description']);
			$display = getCleanString($_REQUEST['display']);

			$id = getCleanString($_REQUEST['id']); 
			
			$update = mysql_query("UPDATE adminupdate
			 
			SET caption='".$caption."',
			content='".$content."',
			updatemode='".$display."'
			WHERE id='".$id."' LIMIT 1");

			if($update != ""){//

				if($_FILES['photo']['name'] != ""){		
					$width = getCleanString($_REQUEST['width']);
					$height = getCleanString($_REQUEST['height']);
					$fileformat = array('jpg','jpeg','gif','png');
					$directory = "asset/uploads";
					
					$upload = justUpload($fileformat,$directory,$width,$height,"logo");
							
					$chkcat = mysql_query("SELECT upload 
					FROM adminupdate WHERE id ='".$id."'");
					if(mysql_num_rows($chkcat) > 0){
						$chkimg = mysql_fetch_array($chkcat);
						if($chkimg['upload'] != ""){			
							@unlink($chkimg['upload']);
						}
						$update = mysql_query("UPDATE adminupdate 
						SET upload='".$upload['picturename']
						."' WHERE id='".$id."' LIMIT 1");
					}
	
				}




				$_SESSION['divborder'] = "success";
				$_SESSION['error'][] = 'Database updated successfully.';
			}else{
				$_SESSION['error'][] = 'Sorry an error occurred. Please try again later.';
			}
			
		}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}
	return $nextURL;
}
function updatePageDetails(){
	try{
		$nextURL = "more-page-details?id=".$_REQUEST['id'];		
		$_SESSION['error'] = array();
		
	//caption, picture_url, active_status, category link_location, url_content, content, created_on

		
		if(trim($_REQUEST['caption'])==""||trim($_REQUEST['url_content'])==""||trim($_REQUEST['category'])==""){
			$_SESSION['error'][] = 'Please enter all required fields.';	
			$_SESSION['alertstyle'] = "alert";
		}else{
			connectAppDB();
			$caption = getCleanString($_REQUEST['caption']);
			$picture_url = getCleanString($_REQUEST['picture_url']);
			$link_location = getCleanString($_REQUEST['link_location']);
			$url_content = getCleanString($_REQUEST['url_content']); 
			$content = getCleanString($_REQUEST['content']);
			$active_status = getCleanString($_REQUEST['active_status']); 
			$category = getCleanString($_REQUEST['category']); 
			$home_tab = getCleanString($_REQUEST['home_tab']); 
			$id = getCleanString($_REQUEST['id']); 
			
		
			$update = mysql_query("UPDATE morepages 
			SET caption='".$caption."',
			link_location='".$link_location."',
			home_tab='".$home_tab."',
			url_content='".$url_content."',
			content='".$content."',
			category='".$category."',
			active_status='".$active_status."' 
			WHERE id='".$id."' LIMIT 1");

			if($update != ""){//

				if($_FILES['photo']['name']!=""){

					$width = getCleanString($_REQUEST['width']);
					$height = getCleanString($_REQUEST['height']);
					
					$qupload = "SELECT picture_url
					FROM morepages WHERE id='".$id.
					"'";	 	
					$qupld = mysql_query($qupload);	
					$chkimg = mysql_fetch_array($qupld);
					if($chkimg['picture_url'] != ""){			
						@unlink($chkimg['picture_url']);
					}

					$fileformat = array('jpg','jpeg','gif','png');
					$directory = "asset/uploads";
					
					$upload = justUpload($fileformat,$directory,$width,$height,"logo");

					if($upload['upload']=="true"){
						$update = mysql_query("UPDATE morepages SET picture_url='".$upload['picturename']."' WHERE id='".$id."' LIMIT 1");
					}

				}
				
				$_SESSION['divborder'] = "success";
				$_SESSION['error'][] = 'Database updated successfully.';
			}else{
				$_SESSION['error'][] = 'Sorry an error occurred. Please try again later.';
			}
			
		}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}
	return $nextURL;
}
function newPage(){
	try{
		$nextURL = "more-pages-new";		
		$_SESSION['error'] = array();
		
	//caption, picture_url, active_status, link_location, url_content, content, created_on

		
		if(trim($_REQUEST['caption'])==""||trim($_REQUEST['url_content'])==""||trim($_REQUEST['category'])==""){
			$_SESSION['error'][] = 'Please enter all required fields.';	
			$_SESSION['alertstyle'] = "alert";
		}else{
			connectAppDB();
			$caption = getCleanString($_REQUEST['caption']);
			$picture_url = getCleanString($_REQUEST['picture_url']);
			$link_location = getCleanString($_REQUEST['link_location']);
			$url_content = getCleanString($_REQUEST['url_content']); 
			$content = getCleanString($_REQUEST['content']); 
			$category = getCleanString($_REQUEST['category']);
			$home_tab = getCleanString($_REQUEST['home_tab']); 
			
		
		
			$insert = mysql_query("INSERT INTO 
			morepages (caption, link_location, 
			home_tab, url_content, content, 
			created_on, category) VALUES
			('".$caption."', '".$link_location."',
			 '".$home_tab."','".$url_content."',
			 '".$content."', '".getDateTime()."',
			 '".$category."')");
			
			if($insert != ""){//
				$id = (int) mysql_insert_id();
				
				if($_FILES['photo']['name']!=""){//if picture was uploaded
				
					$width = getCleanString($_REQUEST['width']);
					$height = getCleanString($_REQUEST['height']);
									
					$fileformat = array('jpg','jpeg','gif','png');
					$directory = "asset/uploads";
					
					$upload = justUpload($fileformat,$directory,$width,$height,"logo");

					if($upload['upload']=="true"){
						$update = mysql_query("UPDATE morepages SET picture_url='".$upload['picturename']."' WHERE id='".$id."' LIMIT 1");
					}

				}
				
				$_SESSION['divborder'] = "success";
				$_SESSION['error'][] = 'New page was created successfully. Click <a href="more-page-details?id='.$id.'" title="click to view details">Here</a> to view details.';
			}else{
				$_SESSION['error'][] = 'Sorry an error occurred. Please try again later.';
			}
			
		}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}
	return $nextURL;

}
function saveSettings(){
	try{	
		$u = $_SESSION['wtsession'];
		$nextURL = "settings";

		connectAppDB();

		foreach($_POST as $key => $value){
			$update = mysql_query("UPDATE settings
			SET content='".getCleanString($value)."' 
			WHERE caption='".getCleanString($key)."'
			LIMIT 1");
		}

		if ($update != ""){
			$_SESSION['divborder'] = "success";			
			$_SESSION['error'][] = 'Database updated successfully.';							
		}else{	
			$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
			}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
	return $nextURL;
}
function contactUs(){
	try{
		$nextURL = "contact";		
		$_SESSION['error'] = array();
		
		$web_data = getWebsiteData();
		
		if(trim($_REQUEST['clientname']) == "" || trim($_REQUEST['message']) == ""){
			$_SESSION['error'][] = 'Please enter all required fields.';	
			$_SESSION['alertstyle'] = "alert";
		}else{
			connectAppDB();
			$name = getCleanString($_REQUEST['clientname']);
			$email = getCleanString($_REQUEST['email']);
			$phone = getCleanString($_REQUEST['clientphone']);
			$message = getCleanString($_REQUEST['message']); 
			$subject = getCleanString($_REQUEST['subject']); 
		
		
			$insert = mysql_query("INSERT INTO contactus (email, contactsubject, message, names, datesent, phoneno) VALUES
								 ('".$email."', '".$subject."', '".$message."','".$name."', '".getDateTime()."','".$phone."')");
			
			if($insert != ""){//
							
				$to2 = $email;
				$subject2 = "Admin@".$web_data['School_Name'];
				$message2 = "Thank you for contacting us. 
							We will get back to you as soon as possible.";
				@sendEmailNotice($to2,$subject2,$message2,$web_data);

				$too = $web_data['School_Email'];
				$subjectt = "New Contact Message";
				$messagee = "Hello
				$name just sent you a message via the school website:
				$message";
				@sendEmailNotice($too,$subjectt,$messagee,$web_data);

				$_SESSION['divborder'] = "success";
				$_SESSION['error'][] = 'Thank you for contacting us. We will get back to you shortly.';
			}else{
				$_SESSION['error'][] = 'Sorry an error occurred. Please try again later.';
			}
			
		}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}
	return $nextURL;
}
function getDeleteMessages($table,$url,$field,$caption){
	try{
		connectAppDB();
		$nextURL = $url;
				
		$count = count($_REQUEST['messages']);//Collect  total number of checked boxes
		if ($count == 0){
			$_SESSION['error'][] = 'You must select a '.$caption.' to delete';	
			$_SESSION['alertstyle'] = "alert";	
		}else{
			for($e =0; $e <=$count; $e++){
				//check for gallery
				if($table=="gallerypicures"){
					$qupload = "SELECT imagedirectory FROM gallerypicures WHERE id = '".getCleanString($_REQUEST['messages'][$e])."'";	 	
					$qupld = mysql_query($qupload);	
					$chkimg = mysql_fetch_array($qupld);
					if($chkimg['imagedirectory'] != ""){			
						@unlink($chkimg['imagedirectory']);
					}
				}

				//check for photo albums
				if($table=="picfolder"){
					$qupload = "SELECT imagedirectory 
					FROM gallerypicures WHERE 
					folderid = '".getCleanString
					($_REQUEST['messages'][$e])."'";	 	
					$qupld = mysql_query($qupload);	
					while(@$chkimg = mysql_fetch_assoc($qupld)){						
						if($chkimg['imagedirectory'] != ""){			
							@unlink($chkimg['imagedirectory']);
						}//end of if
	
					}// end of while loop
					mysql_query("DELETE FROM gallerypicures WHERE folderid = '".getCleanString($_REQUEST['messages'][$e])."'");
				}

				//check for pages or carousel
				if($table=="morepages"||$table=="carousel"){
					$qupload = "SELECT picture_url FROM ".$table." WHERE id = '".getCleanString($_REQUEST['messages'][$e])."'";	 	
					$qupld = mysql_query($qupload);	
					$chkimg = mysql_fetch_array($qupld);
					if($chkimg['picture_url'] != ""){			
						@unlink($chkimg['picture_url']);
					}
				}
				//check for news
				if($table=="adminupdate"){
					$qupload = "SELECT upload FROM ".$table." WHERE id = '".getCleanString($_REQUEST['messages'][$e])."'";	 	
					$qupld = mysql_query($qupload);	
					$chkimg = mysql_fetch_array($qupld);
					if($chkimg['upload'] != ""){			
						@unlink($chkimg['upload']);
					}
				}
				
				if($table=="testimonies"){
					$qupload = "SELECT picture_url FROM ".$table." WHERE sn = '".getCleanString($_REQUEST['messages'][$e])."'";	 	
					$qupld = mysql_query($qupload);	
					$chkimg = mysql_fetch_array($qupld);
					if($chkimg['picture_url'] != ""){			
						@unlink($chkimg['picture_url']);
					}
				}
				
				if($table=="applications"){
					$qupload = "SELECT filepath FROM ".$table." WHERE id = '".getCleanString($_REQUEST['messages'][$e])."'";	 	
					$qupld = mysql_query($qupload);	
					$chkimg = mysql_fetch_array($qupld);
					if($chkimg['filepath'] != ""){			
						@unlink($chkimg['filepath']);
					}
				}

				$deletequery =mysql_query("DELETE FROM ".$table." WHERE ".$field." = '".getCleanString($_REQUEST['messages'][$e])."'");

			}
			if ($deletequery != ""){
				$_SESSION['divborder'] = "success";//set div border to yes, to style messageborder differently			
				$_SESSION['error'][] = "Selected ".$caption.($count>1?"s":"")." have been deleted succcessfully.";
			}else{
				$_SESSION['error'][] = "Sorry, selected ".$caption.($count>1?"s":"")." could not be deleted successfully. Please try again later.";
			}
		}
	}catch(Exception $ex){
		$_SESSION['errorMsg'] = $ex->getMessage();
		$nextURL = "error.php";
	}
		
    return $nextURL;
}
function uploadNewPicture(){
	try{
		$u = $_SESSION['wtsession'];
		$nextURL = "pictures-new";

	  	$count = count($_REQUEST['counter']);

	  	if($_REQUEST['albumid']==""){
			$_SESSION['error'][] = 'Please select an album.';		
			$_SESSION['alertstyle'] = "alert";
		}else{
			connectAppDB();

			$albumid = getCleanString($_REQUEST['albumid']);
			$directory = "albums/";
			if(!is_dir($directory)){
				if(!mkdir($directory, 0777, TRUE)){					
				}
			}  

			for($e =0; $e < $count; $e++){
				if($_FILES['photo']['name'][$e]!=""){

					$insert = mysql_query("INSERT INTO gallerypicures (folderid,dateuploaded) 
						values
					('".$albumid."','".getDateTime()."')");
					$id = (int) mysql_insert_id();

					if(is_file($_FILES['photo']['tmp_name'][$e])){
						define('DESTINATION', $directory);
						define('RESIZEBY', 'w');
						define('RESIZETO', 750);
						define('QUALITY', 100);
						
						require_once('class_upload/image.class.php');			
			
						$new_f_name = date("Ymd").'_'.time().$e.".".getExtension($_FILES['photo']['name'][$e]); 
						
						$image = new Image($_FILES['photo']['tmp_name'][$e]);
						
						$image->destination = DESTINATION.$new_f_name;
						$picturename=$image->destination;
						
						$image->constraint = RESIZEBY;
						$image->size = RESIZETO;
						$image->quality = QUALITY;
						$image->render();
						
				$updateupload = mysql_query("UPDATE
				gallerypicures SET imagedirectory = 
				'".$picturename."' WHERE id = '".$id."'");
				
					}

				}
				
			}//end of for loop				
							
			if($insert != ""){
				$_SESSION['divborder'] = "success";
				$_SESSION['error'][] = 'Picture upload was successful.';
			}else{
				$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
			}	

		}
	
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
			
	return $nextURL;
}
function uploadCarousel(){
	try{	
		connectAppDB();
		//photo  content   width  height
		$caption = getCleanString($_REQUEST['caption']);
		$width = getCleanString($_REQUEST['width']);
		$height = getCleanString($_REQUEST['height']);
		
		$u = $_SESSION['wtsession'];
		$nextURL = "carousel-new";
		
		$success="false";
		$upload="false";
		
		if($_FILES['photo']['name'] == ""){		
			$_SESSION['error'][] = 'Please select a picture to upload';	
			$_SESSION['alertstyle'] = "alert";			
		}else{
			//set parameters for upload
			$fileformat = array('jpg','jpeg','gif','png');
			$directory = "asset/uploads/carousel";
			
			$upload = justUpload($fileformat,$directory,$width,$height,"logo");
			
			if($upload['upload']=="true"){
				
				$insert = mysql_query("INSERT INTO 
				carousel (caption, picture_url,
				 dateadded) VALUES
				('".$caption."','".$upload['picturename']
				."', '".date("Y-m-d H:i:s")."')");
				
				if ($insert != ""){
					//UPLOAD FILE
					$_SESSION['divborder'] = "success";			
					$_SESSION['error'][] = 'Carousel Picture was added successfully';				
				}else{	
					$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
				}

			}else{
				$_SESSION['error'][] = 'Sorry, an error occurred during file upload. Please try again later.';
			}
		}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
	return $nextURL;
}

function addTestimony(){
	try{	
		connectAppDB();
		//photo  content   width  height
		$name = getCleanString($_REQUEST['name']);
		$testimony = getCleanString($_REQUEST['testimony']);
		$width = getCleanString($_REQUEST['width']);
		$height = getCleanString($_REQUEST['height']);
		
		$u = $_SESSION['wtsession'];
		$nextURL = "testimonies-new";
		
		$success="false";
		$upload="false";
		
		if($_FILES['photo']['name'] == ""){		
			$_SESSION['error'][] = 'Please select a picture to upload';	
			$_SESSION['alertstyle'] = "alert";			
		}else{
			//set parameters for upload
			$fileformat = array('jpg','jpeg','gif','png');
			$directory = "asset/testimonies";
			
			$upload = justUpload($fileformat,$directory,$width,$height,"logo");
			
			if($upload['upload']=="true"){
				
				$insert = mysql_query("INSERT INTO 
				testimonies (name, testimony, picture_url,
				 dateAdded, status) VALUES
				('".$name."','".$testimony."','".$upload['picturename']
				."', '".date("Y-m-d H:i:s")."', 'ACTIVE')");
				
				if ($insert != ""){
					//UPLOAD FILE
					$_SESSION['divborder'] = "success";			
					$_SESSION['error'][] = 'Testimony was added successfully';				
				}else{	
					$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
				}

			}else{
				$_SESSION['error'][] = 'Sorry, an error occurred during file upload. Please try again later.';
			}
		}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
	return $nextURL;
}

function uploadNewFile(){
	try{
		$u = $_SESSION['wtsession'];
		$nextURL = "upload-new";
		if($_FILES['photo']['name'] != ""){		
	
		$fileformat = array('pdf','doc','docx','xls','xlsx');
			

			$uerr = checkUploadedFile($fileformat);
			if ($uerr == "" || $uerr == NULL || empty($uerr)) {//if error flag was not set, FILE FORMAT IS CLEAN


				connectAppDB();// COnnect to Database
			
				$caption = getCleanString($_REQUEST['picturetype']);
				
				
				$nextURL = "upload-new";
		
				$image = $_FILES['photo'];
		


			$chkcat = mysql_query("SELECT * FROM
			uploads WHERE uploadtype =
			'".$caption."' LIMIT 1");
			
			if(mysql_num_rows($chkcat) > 0){
				$query="true";
				$chkimg = mysql_fetch_array($chkcat);
				if($chkimg['filedir'] != ""){			
					@unlink($chkimg['filedir']);
				}				
				$commentid = $chkimg['id'];
			}else{
				$query = mysql_query("INSERT INTO uploads (uploadtype, uploadedby, uploadedon) 
					values
				('".$caption."','".$u->id."','".getDateTime()."')");
		
				$commentid = (int) mysql_insert_id();			
			}


// get id of latest insert
		
				if($query != ""){//on success of insert query
					$checkupload = uploadFile($commentid,"schoolfile",$fileformat);
					$_SESSION['divborder'] = "success";
					$_SESSION['error'][] = 'File upload was successful.';				

				}else{
					$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
				}	
				
			}//END OF FILE FORMAT CHECKING
				
		}else{//NO IMAGE WAS SELECTED
			$_SESSION['error'][] = 'Please make a selection to proceed.';
			$_SESSION['alertstyle'] = "alert";
		}
		
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
	return $nextURL;

}
function newPhotoAlbum(){
	try{	
		connectAppDB();
		$caption = getCleanString($_REQUEST['caption']);
		$description = getCleanString($_REQUEST['description']);
		$u = $_SESSION['wtsession'];
		$nextURL = "folder-new";
			  
		if($_REQUEST['caption']==""){
			$_SESSION['error'][] = 'Please enter all required fields';	
			$_SESSION['alertstyle'] = "alert";			
		}else{
		
			$chkcat = mysql_query("SELECT * FROM picfolder WHERE caption ='".$caption."'");
			if(mysql_num_rows($chkcat) > 0){//Category names are unique, but books can have same name or titles etc
				$_SESSION['error'][] = 'The photo album entered has already been created before.';	
				$_SESSION['alertstyle'] = "alert";
			}else{//New category name
				$insertcat = mysql_query("INSERT INTO picfolder (caption, datecreated, createdby, description) VALUES
				('".$caption."', '".date("Y-m-d H:i:s")."', '".$u->id."', '".$description."')");
					
				if ($insertcat != ""){
					$id = (int) mysql_insert_id();
				$_SESSION['divborder'] = "success";			
				$_SESSION['error'][] = 'Photo album was created successfully. Click <a href="folder-update?id='.$id.'" title="click to view details of recently added record">Here</a> to view details of recently added record.';				
					
				}else{	
					$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
				}
			}
		}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
	return $nextURL;
}

function newJob(){
	try{	
		connectAppDB();
		$caption = getCleanString($_REQUEST['caption']);
		$description = getCleanString($_REQUEST['description']);
		$requirements = getCleanString($_REQUEST['requirements']);
		$u = $_SESSION['wtsession'];
		$nextURL = "careers-new";
			  
		if($_REQUEST['caption']=="" || $_REQUEST['description']=="" || $_REQUEST['requirements']==""){
			$_SESSION['error'][] = 'Please enter all required fields';	
			$_SESSION['alertstyle'] = "alert";			
		}else{
		
			$chkcat = mysql_query("SELECT * FROM careers WHERE title ='".$caption."'");
			if(mysql_num_rows($chkcat) > 0){//Category names are unique, but books can have same name or titles etc
				$_SESSION['error'][] = 'The job title entered has already been created before.';	
				$_SESSION['alertstyle'] = "alert";
			}else{//New category name
				$insertcat = mysql_query("INSERT INTO careers (title, description, requirements, createdby, createdon, status) VALUES
				('".$caption."', '".$description."', '".$requirements."', '".$u->id."', '".date("Y-m-d H:i:s")."', 'ACTIVE')");
					
				if ($insertcat != ""){
					$id = (int) mysql_insert_id();
				$_SESSION['divborder'] = "success";			
				$_SESSION['error'][] = 'New job was created successfully. Click <a href="career-update?id='.$id.'" title="click to view details of recently added job">Here</a> to view details of recently added job.';				
					
				}else{	
					$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
				}
			}
		}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
	return $nextURL;
}

function updateCarousel(){
	try{	
		connectAppDB();
		$caption = getCleanString($_REQUEST['caption']);
		$id = getCleanString($_REQUEST['id']);
		$active_status = getCleanString($_REQUEST['active_status']);
		$u = $_SESSION['wtsession'];
		$nextURL = "carousel-details?id=".$_REQUEST['id'];
		$width = getCleanString($_REQUEST['width']);
		$height = getCleanString($_REQUEST['height']);		
					  
		if($_REQUEST['caption']==""){
			$_SESSION['error'][] = 'Please enter all required fields';	
			$_SESSION['alertstyle'] = "alert";			
		}else{
			$update = mysql_query("UPDATE carousel
			SET caption='".$caption."', 
			active_status='".$active_status."' 
			WHERE id='".$id."'");
				
			if ($update != ""){

				if($_FILES['photo']['name'] != ""){		
					$fileformat = array('jpg','jpeg','gif','png');
					$directory = "asset/uploads/carousel";
					
					$upload = justUpload($fileformat,$directory,$width,$height,"logo");
		
					$chkcat = mysql_query("SELECT picture_url 
					FROM carousel WHERE id ='".$id."'");
					if(mysql_num_rows($chkcat) > 0){
						$chkimg = mysql_fetch_array($chkcat);
						if($chkimg['picture_url'] != ""){			
							@unlink($chkimg['picture_url']);
						}
						$update = mysql_query("UPDATE carousel 
						SET picture_url='".$upload['picturename']
						."' WHERE id='".$id."' LIMIT 1");
					}
	
				}

			$_SESSION['divborder'] = "success";			
			$_SESSION['error'][] = 'Database updated successfully.';				
				
			}else{	
				$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
			}
		
		}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
	return $nextURL;
}
function updateTestimony(){
	try{	
		connectAppDB();
		$name = getCleanString($_REQUEST['name']);
		$testimony = getCleanString($_REQUEST['testimony']);
		$id = getCleanString($_REQUEST['id']);
		$status = getCleanString($_REQUEST['status']);
		$u = $_SESSION['wtsession'];
		$nextURL = "testimonies-details?id=".$_REQUEST['id'];
		$width = getCleanString($_REQUEST['width']);
		$height = getCleanString($_REQUEST['height']);		
					  
		if($_REQUEST['testimony']=="" || $_REQUEST['name']==""){
			$_SESSION['error'][] = 'Please enter all required fields';	
			$_SESSION['alertstyle'] = "alert";			
		}else{
			$update = mysql_query("UPDATE testimonies
			SET name='".$name."', testimony='".$testimony."', 
			status='".$status."' 
			WHERE sn='".$id."'");
				
			if ($update != ""){

				if($_FILES['photo']['name'] != ""){		
					$fileformat = array('jpg','jpeg','gif','png');
					$directory = "asset/testimonies";
					
					$upload = justUpload($fileformat,$directory,$width,$height,"logo");
		
					$chkcat = mysql_query("SELECT picture_url 
					FROM testimonies WHERE sn ='".$id."'");
					if(mysql_num_rows($chkcat) > 0){
						$chkimg = mysql_fetch_array($chkcat);
						if($chkimg['picture_url'] != ""){			
							@unlink($chkimg['picture_url']);
						}
						$update = mysql_query("UPDATE testimonies 
						SET picture_url='".$upload['picturename']
						."' WHERE sn='".$id."' LIMIT 1");
					}
	
				}

			$_SESSION['divborder'] = "success";			
			$_SESSION['error'][] = 'Database updated successfully.';				
				
			}else{	
				$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
			}
		
		}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
	return $nextURL;
}
function updatePhotoAlbum(){
	try{	
		connectAppDB();
		$caption = getCleanString($_REQUEST['caption']);
		$id = getCleanString($_REQUEST['id']);
		$description = getCleanString($_REQUEST['description']);
		$u = $_SESSION['wtsession'];
		$nextURL = "folder-update?id=".$_REQUEST['id'];
			  
		if($_REQUEST['caption']==""){
			$_SESSION['error'][] = 'Please enter all required fields';	
			$_SESSION['alertstyle'] = "alert";			
		}else{
		
			$chkcat = mysql_query("SELECT * FROM picfolder WHERE caption ='".$caption."' AND id!='".$id."'");
			if(mysql_num_rows($chkcat) > 0){//Category names are unique, but books can have same name or titles etc
				$_SESSION['error'][] = 'The photo album entered has already been created before.';	
				$_SESSION['alertstyle'] = "alert";
			}else{//New category name
				$update = mysql_query("UPDATE picfolder SET caption='".$caption."', description='".$description."' WHERE id='".$id."'");
					
				if ($update != ""){
				$_SESSION['divborder'] = "success";			
				$_SESSION['error'][] = 'Database updated successfully.';				
					
				}else{	
					$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
				}
			}
		}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
	return $nextURL;

}
function updateJob(){
	try{	
		connectAppDB();
		$caption = getCleanString($_REQUEST['caption']);
		$id = getCleanString($_REQUEST['id']);
		$description = getCleanString($_REQUEST['description']);
		$requirements = getCleanString($_REQUEST['requirements']);
		$status = getCleanString($_REQUEST['status']);
		$u = $_SESSION['wtsession'];
		$nextURL = "career-update?id=".$_REQUEST['id'];
			  
		if($_REQUEST['caption']=="" || $_REQUEST['description']=="" || $_REQUEST['requirements']==""){
			$_SESSION['error'][] = 'Please enter all required fields';	
			$_SESSION['alertstyle'] = "alert";			
		}else{
		
			$chkcat = mysql_query("SELECT * FROM careers WHERE title ='".$caption."' AND id!='".$id."'");
			if(mysql_num_rows($chkcat) > 0){//Category names are unique, but books can have same name or titles etc
				$_SESSION['error'][] = 'The job entered has already been created before.';	
				$_SESSION['alertstyle'] = "alert";
			}else{//New category name
				$update = mysql_query("UPDATE careers SET title='".$caption."', description='".$description."', requirements='".$requirements."', status='".$status."' WHERE id='".$id."'");
					
				if ($update != ""){
				$_SESSION['divborder'] = "success";			
				$_SESSION['error'][] = 'Database updated successfully.';				
					
				}else{	
					$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
				}
			}
		}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
	return $nextURL;

}
function sendSMS(){
	try{	
		$nextURL = "contact";
		connectAppDB();
		$web_data = getWebsiteData();
		//usernames  phone  message
		if($_REQUEST['usernames']==""||$_REQUEST['phone']==""||$_REQUEST['message']==""){
			$_SESSION['error'][] = 'Please enter all required fields';	
			$_SESSION['alertstyle'] = "alert";		
		}else{
			$usernames = $_REQUEST['usernames'];	
			$phone = $_REQUEST['phone'];	
			$message = "[{$usernames}][{$phone}] ".$_REQUEST['message'];		
			
			//send sms
			$url = getSMSUrl("compose",$web_data['SMS_USER'],$web_data['SMS_PASS'],$web_data['SMS_SENDER'],$web_data['SMS_PHONE'],$message,$sendon);
			$result =  get_web_page($url);			

			$_SESSION['infostyle'] = "info";		
			$_SESSION['error'][] = smsStatusMsg($result['content']);
		}

	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
	return $nextURL;
}
function newsLetterNew(){
	try{	
		connectAppDB();

		if($_REQUEST['useremail']==""){
			$flag=1;			
		}else{
			$email = getCleanString($_REQUEST['useremail']);		
			
			$chkcat = mysql_query("SELECT id FROM
			newsletter WHERE email ='".$email."'");
			if(mysql_num_rows($chkcat) > 0){
				$flag=2;
			}else{//New category name
				$query = "INSERT INTO newsletter 
				(email,  dateadded) VALUES
				('".$email."',
				'".date("Y-m-d H:i:s")."')";
				
				$insert = mysql_query($query);
					
				if ($insert != ""){
					$flag=3;			
				}else{	
					$flag=4;
				}
			}
		}
		$nextURL = "index?flag=".$flag."#newsletter";
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
	return $nextURL;
}
function socialMedia(){
	//caption  medialink  dateadded
	//socialmedia
	try{	
		connectAppDB();
		//content   caption
		$caption = getCleanString($_REQUEST['caption']);
		$medialink = getCleanString($_REQUEST['medialink']);
		
		$u = $_SESSION['wtsession'];
		$nextURL = "social-media-new";
			  
		if(trim($_REQUEST['caption'])==""||trim($_REQUEST['medialink'])==""){
			$_SESSION['error'][] = 'Please enter all required field';	
			$_SESSION['alertstyle'] = "alert";			
		}else{
		
			$chkcat = mysql_query("SELECT * FROM socialmedia WHERE caption ='".$caption."'");
			if(mysql_num_rows($chkcat) > 0){

				$update = mysql_query("UPDATE socialmedia SET medialink='".$medialink."' WHERE caption='".$caption."' LIMIT 1");
					
				if ($update != ""){
				$_SESSION['divborder'] = "success";			
				$_SESSION['error'][] = 'Social Media Page updated successfully.';				
					
				}else{	
					$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
				}

			}else{//New category name
				$insert = mysql_query("INSERT INTO socialmedia (caption, medialink, dateadded) VALUES
				('".$caption."','".$medialink."', '".date("Y-m-d H:i:s")."')");
					
				if ($insert != ""){
					$id = (int) mysql_insert_id();
				$_SESSION['divborder'] = "success";			
				$_SESSION['error'][] = 'Social Media Page was added successfully';				
					
				}else{	
					$_SESSION['error'][] = 'Sorry, an error occurred. Please try again later.';
				}
			}
		}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
	return $nextURL;
}
function sendNewsletter(){
	try{	
		
		$u = $_SESSION['wtsession'];
		$nextURL = "newsletter";
		
		connectAppDB();
		$web_data = getWebsiteData();
		$caption = getCleanString($_REQUEST['caption']); 
		$content = getCleanString($_REQUEST['content']); 
		$html = preg_replace('/(<\/[^>]+?>)(<[^>\/][^>]*?>)/', '$1 $2', $content);		
		$html = strip_tags($html, '<br><br/>');

		$insert = mysql_query("INSERT INTO 
		newsletters (caption, content, datesent) 
		VALUES
		('".$caption."', '".$html."', 
		'".getDateTime()."')");
		
		if($insert != ""){
			$subject = $web_data['School_Name']."[".$caption."]";

			$myquery = "SELECT * FROM newsletter";
			$list = mysql_query($myquery);	
			$countlist = @mysql_num_rows($list);
			if($countlist>0){
				while(@$email = mysql_fetch_assoc($list)){
					@sendEmailNotice($email['email'],$subject,$content,$web_data);
				}
			}			

			$_SESSION['divborder'] = "success";
			$_SESSION['error'][] = 'Newsletter was sent successfully.';
		}else{
			$_SESSION['error'][] = 'Sorry an error occurred. Please try again later.';
		}

	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
	return $nextURL;
}
?>