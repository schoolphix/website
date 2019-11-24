<?php
require_once("functions.php");
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="Job Application";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(7,1,$web_data,$links);


getPageBanner($title,$crumb,$web_data);

?>

<!-- Start Content -->
<div id="content">
	<div class="container">
		
		<div class="row">
			
			<div class="col-md-8">
			<?php
				connectAppDB();
				$uploadDir = 'C:/wamp/www/webite/jobapplication/';
				
				if(isset($_POST['submit']))
				{
				$name = addslashes($_POST['name']);
				$phone = addslashes($_POST['phone']);
				$email = addslashes($_POST['email']);
				$jid = addslashes($_POST['id']);
				$fileName = md5(date("Y-m-d H:i:s")) . $_FILES['userfile']['name'];
				$tmpName = $_FILES['userfile']['tmp_name'];
				$fileSize = $_FILES['userfile']['size'];
				$fileType = $_FILES['userfile']['type'];
				if(trim($name)=="" || trim($phone)=="" || trim($email)=="" || trim($fileName)==""){
				 echo "<div class='portlet-msg-alert'>Fill in all empty fields</div>";
				}
				else
				{
				$filePath = $uploadDir . $fileName;
				
				$result = move_uploaded_file($tmpName, $filePath);
				if (!$result) {
				echo "<div class='portlet-msg-alert'>Fill in all empty fields</div>";
				}
				
				if(!get_magic_quotes_gpc())
				{
				$fileName = addslashes($fileName);
				$filePath = addslashes($filePath);
				}
				
				$query = "INSERT INTO applications (name, phone, email, jobid, filename, filesize, filetype, filepath, createdon ) ".
				"VALUES ('$name', '$phone', '$email', '$jid', '$fileName', '$fileSize', '$fileType', '$filePath', '".date("Y-m-d H:i:s")."')";
				
				mysql_query($query) or die('Error, query failed : ' . mysql_error());
				
				
				echo "<div class='portlet-msg-success'>Application was successful</div>";
				
				}
				}
			?>
            	
			<? 
                if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] >= 0 || isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] >= 0){		
                    $fid = addslashes($_GET['id']);
            ?> 				             
				<!-- Start Contact Form -->
                <? callErrorMessage();?>
                <form role="form" class="contact-form" id="contact-form" method="post" action="job-application" enctype="multipart/form-data">
                <div class="form-group">
                <div class="controls">
                <input type="text" placeholder="Name*" name="name" required="required">
                </div>
                </div>
                <div class="form-group">
                <div class="controls">
                <input type="text" placeholder="Phone*" name="phone" required="required">
                </div>
                </div>
                <div class="form-group">
                <div class="controls">
                <input type="email" class="email" placeholder="Email*" name="email" required="required">
                </div>
                </div>
                <div class="form-group">
                <div class="controls">
                <input type="file" class="requiredField" placeholder="cv" name="userfile">Upload your resume*
                </div>
                </div>
                <input type="hidden" name="id" value="<?=$fid?>" />
				<!--<input type="hidden" name="action" value="apply-for-job" />-->
                <button type="submit" id="submit" name="submit" class="btn btn-base">Submit Application</button>
                <button type="button" id="submit" class="btn btn-light" onClick="parent.location='careers'">Cancel</button>
                </form>
				<!-- End Contact Form -->
			
            <? }else{?>
    			<div class="portlet-msg-alert">Please Enter a Valid job ID to apply for</div>
    		<? }?> 
			</div>
<?	getSideBar($links)?> 
			
		</div>
		
	</div>
</div>
<!-- End content -->


<?php
getSiteFooter($web_data);
?>