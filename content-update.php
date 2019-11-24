<?php
require_once("functions.php");
mustLogin();

$u = $_SESSION['wtsession'];

if(!isset($_GET['option'])){
	$_SESSION['alertstyle'] = "alert";
	$_SESSION['error'][] = "Please select an option type to perform action on.";
	header("location: cpanel-home");
	exit;
}else{
	$option = addslashes(trim($_GET['option']));
	$mode = addslashes(trim($_GET['mode']));
}
if(isset($_POST['action']) && $_POST['action'] == "update-content"){//when users clicks on the submit button
	
	try{
		$_SESSION['error'] = array();		
		
		connectAppDB();
		$option = getCleanString($_REQUEST['option']);
		$caption = getCleanString($_REQUEST['caption']);
		$content = getCleanString($_REQUEST['content']);
		$display = getCleanString($_REQUEST['display']);
		
		if($content==""){
			$_SESSION['alertstyle'][] = "alert.";
			$_SESSION['error'][] = "Please Enter All Required Fields.";
		}else{			
			$insert = mysql_query("INSERT INTO adminupdate 
			(caption, content, upload, userid, updatetype, updatemode, uploadedon) 
			VALUES 
			('".$caption."','".$content."', '".$upload['picturename']."',
			'".$u->id."','".$option."', '".$display."', '".getDateTime()."')");
			
			$id = (int) mysql_insert_id();
			if ($insert!="") {
				
				if($_FILES['photo']['name'] != ""){		

					$width = getCleanString($_REQUEST['width']);
					$height = getCleanString($_REQUEST['height']);
					$fileformat = array('jpg','jpeg','gif','png');
					$directory = "asset/uploads";
					
					$upload = justUpload($fileformat,$directory,$width,$height,"logo");

					$update = mysql_query("UPDATE
					adminupdate 
					SET upload='".$upload['picturename']
					."' WHERE id='".$id."' LIMIT 1");

				}

				$_SESSION['divborder'] = "success";
				$_SESSION['error'][] = "Database update was successful.";
			}else{
				$_SESSION['error'][] = "An error occurred. Please try again later.";
			}

		}

	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}		
		
}


$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title = "Add $option";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
if($option=="elearning"){
	$type="advanced";
}else{
	$type="simple";
}
getTinyMCEScript($type);
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = '';
$crumb[1][1] = $title;
$crumb[1][2] = $title;

getPageBanner($title,$crumb,$web_data);
?>


<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row sidebar-page">
            
            
            <!-- Page Content -->
            <div class="col-md-9 page-content">

               <? callErrorMessage();?>
 
                <!-- Classic Heading -->
                <h4 class="classic-title"><span><?=$title?></span>
                	<span style="float:right">
                		<a href="content-list"><b>See All News</b></a>			
                	</span>
                
                </h4>
                
				<!-- Start Contact Form -->
 
    <? 
   		
   		if($option=="elearning"){
			connectAppDB();
			$fetchdata = mysql_query("SELECT * FROM adminupdate WHERE updatetype = '".$option."' 
			AND updatemode = '".$mode."' LIMIT 1");
			$CNT = mysql_fetch_array($fetchdata);
			$nwcaption = $CNT['caption'];
			$nwcontent = $CNT['content'];
			
		}else{
			$nwcaption = "";
			$nwcontent = "";
		}
   ?> 

<form name ="forumnewpost" id="forumnewpost" method="POST" action="<?=$_SERVER['REQUEST_URI']?>" enctype="multipart/form-data">
   <? if($option!="upcoming"&&$option!="elearning"){?>
    <table width="100%" border="0" class="mytable" align="center" style="border-top:none">
     
      <tr>
        <td align="left"><span style="font-weight:bold">Caption:</span></td>
        <td align="left">
          <input type="text" name="caption" class="email" value="<?=$nwcaption?>" title="enter caption" />
    </td>
      </tr>
	  
	  <?	if($option=="news"){?>
				
				<tr>
					<td align="left"><span style="font-weight:bold">Display In:</span></td>
					<td align="left">
						<select name="display" class="email">
							<option value="home">Home page (As POP UP)</option>
							<option value="other">Other pages</option>
						</select>
					</td>
				</tr>
				
	  <?	}?>
	  
  <tr>
    <td align="left"><span style="font-weight:bold">Select Picture:</span></td>
    <td align="left">
<input type="file" name="photo" title="show upload dialog" class="email" />
	</td>
  </tr>
  <tr>                
    <td align="left" colspan="2">&nbsp;
    </td>
  </tr>

  <tr>
    <td align="left">
    	<label onClick="if(document.getElementById('check_resize').checked){document.getElementById('show_resize').style.display='block';}else{document.getElementById('show_resize').style.display='none';}"><b>Resize Picture?</b>
<input type="checkbox" style="cursor:pointer" name="remember" onClick="" id="check_resize"/>
	</label>
    </td>
    <td>&nbsp;</td>
 </tr>

  <tr>
    <td>&nbsp;</td>
    <td align="left">
    <div class="form-group" id="show_resize" style="display:none">
    <div class="controls">
		<input type="text" name="width" placeholder="width" style="width:100px"/> * <input type="text" name="height" placeholder="Height" style="width:100px;"/>
    </div>
    </div>
    	
    </td>
 </tr>

</table>
    <? }?>
          
          <textarea name="content" class="smallTxtArea" title="enter content body" style="width:450px;height:150px"><?=$nwcontent?></textarea>
    <table width="100%" border="0" class="mytable" align="center" style="border-top:none">
      <tr>                
        <td align="left" colspan="2">&nbsp;
          
        </td>
      </tr>
      <tr>
        <td align="left" colspan="2">
        <input type="hidden" name="action" value="update-content" />
        <input type="submit" name="Post" class="mybutton" id="submit" value="Publish" style="cursor:pointer" title="click to publish to public page"/>&nbsp;&nbsp;
        <input type="button" name="cancelpost" class="mybutton" id="submit" value="Cancel" style="cursor:pointer" title="Click to Cancel" onclick="parent.location = 'cpanel-home'"/>
        </td>
      </tr>
    </table>            
    </form>  
          
				<!-- End Contact Form -->
                 
                
                <!-- Divider -->
                <div class="hr5" style="margin-top:30px; margin-bottom:45px;"></div>




            </div>
            <!-- End Page Content-->
            

<?	getSideBar($links)?>            
            
        </div>
    </div>
</div>
<!-- End Content -->


<?php
getSiteFooter($web_data,0);
?>