<?php
require_once("functions.php");
mustLogin();
define("PAGE_LIMIT", 12);
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="Album Pictures";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
getPaginationCss();
getDeleteConfirmation(1,"Selected pictures will be deleted. Continue?");
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = 'folder-list';
$crumb[1][1] = 'album list';
$crumb[1][2] = 'Album List';
$crumb[2][0] = '';
$crumb[2][1] = 'album pictures';
$crumb[2][2] = 'Album Pictures';

getPageBanner($title,$crumb,$web_data);
?>


<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row sidebar-page">
            
<?
if(isset($_GET['aid']) && is_numeric($_GET['aid']) && $_GET['aid']>0){
	$fid = addslashes(trim($_GET['aid']));
	$folder = getFolderById($fid);
}

?>
            
            <!-- Page Content -->
            <div class="col-md-9 page-content">

               <? callErrorMessage();?>
 
                <!-- Classic Heading -->
                <h4 class="classic-title"><span><?=$folder['caption']?> Album Pictures</span></h4>
                
				<!-- Start Contact Form -->


  	<? 
	  	if(isset($_GET['aid']) && is_numeric($_GET['aid']) && $_GET['aid']>0){
		$fid = addslashes(trim($_GET['aid']));
	
	
		$statement = "`gallerypicures` WHERE folderid = '".$fid."'";			
					
		$page = (int) (!isset($_GET["page"]) ? 1 : addslashes($_GET["page"]));
		
		
		$limit = PAGE_LIMIT;
		$startpoint = ($page * $limit) - $limit;

	
		$sessiondetails = getPictures($fid,$startpoint,$limit);
		
		if($sessiondetails != 0){
?>
            
			<form name="viewquestions" id="viewquestions" method="post" action="controller" onsubmit="return deletepost(this)">   
            
                <table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
                  <tr>
                    <td align="center">
                    <label style="cursor:pointer">
                <input type="checkbox" name="deleteallpost" id="deleteallpost" title="check to delete all your post" onclick="checkAll()"/>
                <span style="color:#009">Select All</span> 
                </label></td>
                  </tr>
                </table>
                 
                <div id="postlisting">
 
			  <?
                $i = 1;
                while(@$row = mysql_fetch_array($sessiondetails)){
					?>
                    	<table width="25%" border="0" cellspacing="5" cellpadding="5" align="left">
                    		<tr class='gradeA'>
                            <tr>
                            	<td align="center">
                                <label style="cursor:pointer">
		<input type='checkbox' title='click to select file for deleting' id='course[]' name='messages[]' value=<?=$row["id"]?>>&nbsp;
        <span style="color:#AA0000">delete</span>
                               </label>
                                </td>
                                </tr>
                                <tr>
                            	<td align='center'>                                
									<? $imgdir = $row['imagedirectory']; ?>
									<img src="<?=$imgdir?>" width="150" height="150"  title="<?=$row["title"]?>"/>
                                </td> 
                            </tr>
                            <tr class='gradeA'>
                            	<td align='center'>
                                <span style="color:#02ACEE">Uploaded <?=christime($row['dateuploaded'])?></span>
                                </td> 
                            </tr>
                       </table>                               
					<? $i++;}?>
                    </div>

	<table width="100%" border="0">
		<tr>
        	<td align="right">                    			
            <?
			echo "<br>";
			$url = "?aid=".$fid."&";      
			echo pagination($statement,$limit,$page,$url);
			?>
			</td>
         </tr>
      </table>
              <br />
            <table width="80%" border="0" cellspacing="10" cellpadding="10">
              <tr>
                <td>  
                    <input type='submit' name='deactivate' id='mybutton' value='Delete Selected Pictures' title='click to delete selected pictures'/>&nbsp;&nbsp;
                  <input type="button" id="mybutton" value="Cancel" onclick="parent.location='folder-list'" />
                    <input type="hidden" name="aid" value="<?=$fid?>" />
					<input type='hidden' name='action' value='delete-album-pictures'/>
                </td>
              </tr>
            </table>

              </form>

	<?	}else{?>
    			<div class="portlet-msg-info">Sorry, no picture has been uploaded to the album with this album id.</div>
	<? }?>
<? }else{?>       
		<div class="portlet-msg-alert">Please specify a valid album id to view this page</div>
<? }?>


     
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