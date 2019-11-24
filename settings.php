<?php
require_once("functions.php");
mustLogin("ADMIN");
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="Basic Settings";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
?>
<script type="text/javascript" src="texteditors/nicEdit.js"></script>

<script type="text/javascript">
	function addEdit(textid,holderid) {
		area = new nicEditor({fullPanel : true}).panelInstance(textid);
		$("#addedit"+holderid).hide();
		$("#removeedit"+holderid).show();
	}
	function removeEdit(textid,holderid) {
		area.removeInstance(textid);
		$("#removeedit"+holderid).hide();
		$("#addedit"+holderid).show();
	}
	//bkLib.onDomLoaded(function() { toggleArea1(); });
</script>	

<?
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = '';
$crumb[1][1] = 'settings listing';
$crumb[1][2] = 'Settings Listing';

getPageBanner($title,$crumb,$web_data);

$url = getSMSUrl("check-credit",$web_data['SMS_USER'],$web_data['SMS_PASS'],"","","","");

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
                	<a href="setting-new"><b>Add New Setting</b></a>
                &nbsp;&nbsp;&nbsp;
                <?=$url?>
                </span>
                </h4>
                
				<!-- Start Contact Form -->
 
<?
  	connectAppDB(); 
	$myquery = "SELECT * FROM settings";
	$displayMsg = "Settings";
	$nullMsg = "No contact message was found.";	

	$list = mysql_query($myquery);	
	
	//$list = mysql_query($myquery);
	$countlist = @mysql_num_rows($list);

	$i=1;
?>
<? if($countlist > 0){?>

<form name="viewaccounts" class="contact-form" id="contact-form" method="post" action="controller">

  <table cellpadding="0" cellspacing="0" border="0" class="mytable">
      <tr>
        <td align="left" colspan="2">
        <input type="submit" name="Post" id="submit" value="Save" class="mybutton" title="send message"/>&nbsp;&nbsp;
        <input type="button" name="cancelpost" id="submit" value="Cancel" class="mybutton" title="Click to Cancel" onclick="parent.location = 'cpanel-home'"/>
        </td>
      </tr>
</table>    
<br />
  <table cellpadding="0" cellspacing="0" border="0" class="mytable" id="datalist">
  
        <thead>
 			 <tr class="gradeA">
                <th align="left">Settings Caption</th>
                <th align="left">Content</th>
           </tr>
           </thead>
 	<? while(@$record = mysql_fetch_assoc($list)){?>
 		<tr <?=($i%2?"class='light'":"class='dark'")?>>
            <td align='left'><B><?=$record["caption"]?></B></td>
            <td align='left' width="70%">
            <?	if($record["settingtype"]==1){?>
                    <textarea rows="2"  placeholder="Settings Content:" id="textarea<?=$i?>" name="<?=$record["caption"]?>" ><?=$record["content"]?></textarea>
                    <img id="addedit<?=$i?>" src='images/home-eye.png' style='cursor:pointer' title='activate text editor' onclick="addEdit('textarea<?=$i?>','<?=$i?>');">
                    <img id="removeedit<?=$i?>" src='images/home-eye-close.png' style='cursor:pointer;display:none' title='remove text editor' onclick="removeEdit('textarea<?=$i?>','<?=$i?>');">
        <?	}else{?>
                <input type="text" name="<?=$record["caption"]?>" title="settings name" class="email" readonly="readonly" value="<?=$record["content"]?>"/>
            <?	}?>
            </td>
		</tr>
		<? $i++;?>

 
 	<? }?>
    </table>
    <br />
  <table cellpadding="0" cellspacing="0" border="0" class="mytable">
      <tr>
        <td align="left" colspan="2">
        <input type="hidden" name="action" value="save-settings" />
        <input type="submit" name="Post" id="submit" value="Save" class="mybutton" title="send message"/>&nbsp;&nbsp;
        <input type="button" name="cancelpost" id="submit" value="Cancel" class="mybutton" title="Click to Cancel" onclick="parent.location = 'cpanel-home'"/>
        </td>
      </tr>
</table>    
</form>   
 <? }else{?>
 	<div class="portlet-msg-info"><?=$nullMsg?></div>
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