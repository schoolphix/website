<?php
require_once("functions.php");
mustLogin();
$web_data = getWebsiteData();
$links = getAllLinks();
define("PAGE_LIMIT",30);
require_once("pagelayout.php");

$title="Subscribers";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
getTinyMCEScript("advanced");
//getDeleteConfirmation(1,"Selected newsletter will be deleted. Continue?");
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = '';
$crumb[1][1] = 'newsletter';
$crumb[1][2] = 'Subscribers';

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
                	<a href="newsletter-list"><b>See All Newsletters</b></a>
                </span>
                </h4>

				<!-- Start Contact Form -->
 
<?
  	connectAppDB(); 
		//$me = $_SESSION['forumUser'];

		if(isset($_GET['offset']) && is_numeric($_GET['offset']) && $_GET['offset'] >= 0){
			$offset = addslashes(trim($_GET['offset']));
		}else{
			$offset = 0; 
		}

			$url = "?";      
			$totalno = mysql_query("SELECT COUNT(*) FROM newsletter");
			list($total_rows) = mysql_fetch_array($totalno);
			//to make pagination
			$statement = "`newsletter`";
		 	$myquery = "SELECT * FROM newsletter
			ORDER BY id DESC LIMIT ".$offset.",
			" .PAGE_LIMIT;
			$displayMsg = "Subscribers";
			$nullMsg = "No newsletter subscriber was found.";	

			$list = mysql_query($myquery);	
			
			//$list = mysql_query($myquery);
			$countlist = @mysql_num_rows($list);
		
			$i=1;
?>
<? if($countlist > 0){?>
    <table width="100%" border="0" align="center" class="tablet4" cellspacing="0">
  			<tr>
            	<input type='hidden' name='action' value='send-newsletter'/>
                <td align="left">
                <label onClick="if(document.getElementById('check_resize').checked){document.getElementById('show_resize').style.display='block';}else{document.getElementById('show_resize').style.display='none';}">
<input type="checkbox" style="cursor:pointer" name="remember" onClick="" id="check_resize"/> <b>Send Newsletter</b>
	</label>
                </td>	
                <td align="right"><strong><?=$displayMsg.": ".$total_rows?></strong></td>
            </tr>
   </table>
   <br />
<div class="form-group" id="show_resize" style="display:none">
        <div class="controls">
            
<form name="postform" method="post" action="controller" class="contact-form" id="contact-form">
    <table class="" width="100%" align="center">
    <tr>
    <td width="25%" align="left" class="leftTd">Subject/Topic:</td>
    <td width="75%" align="left">
      <input type="text" name="caption" class="email" title="enter newsletter subject" required="required">
    </td>
    </tr>
    <tr>
    <td class="leftTd" align="left">Newsletter Content:</td>
    <td align="left">
        <textarea name="content" id="description" cols="45" rows="3" class="email" title="enter page content"></textarea>

	</td>
    </tr>
    <tr><td>&nbsp;</td><td align="left">
    <input type="submit" name="createcat" id="mybutton" title="click to send" value="Send" />&nbsp;
    <input type="hidden" name="action" value="send-newsletter" />
<input type='button' id='mybutton' value='Cancel' title='click to cancel' onclick="parent.location='cpanel-home'">
    </td></tr>
    </table>

  </form>
              
        </div>
    </div>   
   <br />
<form name="viewaccounts" id="viewaccounts" method="post" action="controller" onsubmit="return deletepost(this)">
  <table cellpadding="0" cellspacing="0" border="0" class="mytable" id="datalist">
  
        <thead>
 			 <tr class="gradeA">
             	<th align="left">SN</th>
                <th align="left">Email</th>
                <th align="left">Subscribed On</th>
           </tr>
           </thead>
 	<? while(@$record = mysql_fetch_assoc($list)){?>
 		<tr <?=($i%2?"class='light'":"class='dark'")?>>
            <td align='center'><?=$i?></td>
            <td align='left' width="15%"><?=$record["email"]?></td>
            <td align='center'><?=$record["dateadded"]?></td>
		</tr>
		<? $i++;?>

 
 	<? }?>
    </table>
</form>   
 <? }else{?>
 	<div class="portlet-msg-info"><?=$nullMsg?></div>
 <? }?>
<table width="80%" border="0" cellpadding="0" cellspacing="0" align="right"><tr><td align="right"><font face='calibri' color='#000099'>
<?
echo "<br>";
echo "<b>".($offset+1).' to '.($offset+$countlist).' of '.$total_rows."</b>";
echo "<br><br>";
navigation ($offset,"newsletter",$total_rows,$url);?>				
</font></td></tr></table></table>

     
     
     
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