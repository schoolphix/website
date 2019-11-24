<?php
require_once("functions.php");
mustLogin("ADMIN");

connectAppDB(); 
$caption = "";
$content = "";
$color = "";

$u = $_SESSION['wtsession'];

if(isset($_POST['action'])&&$_POST['action']=="update-box") {
	
	$newcaption = getCleanString($_POST['caption']);
	$newcontent = getCleanString($_POST['content']);
	$newcolor = getCleanString($_POST['color']);
	$newboxnum = getCleanString($_POST['boxnum']);
	
	$myquery = "SELECT * FROM adminupdate WHERE updatetype = 'boxes' AND updatemode = 
	'".getCleanString($_POST['boxnum'])."' LIMIT 1";
	$result = mysql_query($myquery);
	
	$countlist = @mysql_num_rows($result);
	
	if($countlist==0){//new record, insert
		$insert = mysql_query("INSERT INTO adminupdate 
			(caption, upload, content, userid, updatetype, updatemode, uploadedon) VALUES
			('".$newcaption."','".$newcolor."','".$newcontent."','".$u->id."','boxes',
			 '".$newboxnum."', '".getDateTime()."')") or die(mysql_error());
			 
	}else{//old record, update
		$update = mysql_query("UPDATE adminupdate 
		SET caption='".$newcaption."',content='".$newcontent."' ,upload='".$newcolor."' 
		WHERE updatetype='boxes' AND updatemode='".$newboxnum."'");
	}
}
	
if(isset($_REQUEST['boxnum'])){
	$myquery = "SELECT * FROM adminupdate WHERE updatetype = 'boxes' AND updatemode = 
	'".getCleanString($_REQUEST['boxnum'])."' LIMIT 1";
	$result = mysql_query($myquery);
	$record = mysql_fetch_array($result);
	$caption = $record['caption'];
	$content = $record['content'];
	$color = $record['upload'];
}

$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="Edit Homepage Boxes";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
?>
<script type="text/javascript" src="texteditors/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<?
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = '';
$crumb[1][1] = 'upload carousel picture';
$crumb[1][2] = 'Upload Carousel Picture';

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
                <h4 class="classic-title"><span>Edit Homepage Boxes</span></h4>
                
				<!-- Start Contact Form -->
 
<form name="forumnewpost" id="forumnewpost" method="POST" action="homebox">
	
	<table width="100%" border="0" class="mytable" align="center" style="border-top:none">

	<tr>
		<td align="left">Select Box</td>
		<td align="left">
			<select name="boxnum" onchange="if(this.value!=''){parent.location='homebox?boxnum='+this.value}" class="email">
				<option value="">Select Box</option>
				 <option value="1" <?=@$_REQUEST['boxnum']==1?"selected":""?>>First Box</option>
				 <option value="2" <?=@$_REQUEST['boxnum']==2?"selected":""?>>Second Box</option>
				 <option value="3" <?=@$_REQUEST['boxnum']==3?"selected":""?>>Third Box</option>
				 <option value="4" <?=@$_REQUEST['boxnum']==4?"selected":""?>>Fourth Box</option>
			 </select>
		</td>
	</tr>
	<tr>
    <td align="left" width="10%"><span style="font-weight:bold">Caption:</span></td>
    <td align="left">
		<input type="text" name="caption" title="enter caption here" required="required" class="email" placeholder="Caption" value="<?=$caption?>" />
	</td>
  </tr>
  
  <tr>
    <td align="left" width="25%"><span style="font-weight:bold">Content:</span></td>
    <td align="left">
		<textarea name="content" title="enter content" rows="1" cols="50"><?=$content?></textarea>
    </td>
 </tr>

 <tr>
    <td align="left" width="10%"><span style="font-weight:bold">Background Colour:</span></td>
    <td align="left">
		<input type="text" name="color" title="enter background colour here" class="email" placeholder="Background Colour" value="<?=$color?>" />
	</td>
  </tr>
  
  <tr>                
    <td align="left" colspan="2">&nbsp;
    </td>
  </tr>

  <?	if(isset($_REQUEST['boxnum'])){?>
			<tr>
				<td>&nbsp;</td>
				<td align="left">
					<input type="hidden" name="action" value="update-box" />
					<input type="submit" name="Post" id="submit" value="Save" class="mybutton" title="save"/>&nbsp;&nbsp;
					<input type="button" name="cancelpost" id="submit" value="Cancel" class="mybutton" title="Click to Cancel" onclick="parent.location = 'cpanel-home'"/>
				</td>
			  </tr>
  <?	}?>
  
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
getSiteFooter($web_data);
?>