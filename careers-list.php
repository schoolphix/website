<?php
require_once("functions.php");
mustLogin("ADMIN");
$web_data = getWebsiteData();
$links = getAllLinks();
define("PAGE_LIMIT",30);
require_once("pagelayout.php");

$title="All Jobs";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
getDeleteConfirmation(1,"Selected jobs will be deleted. Continue?");
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = '';
$crumb[1][1] = 'jobs';
$crumb[1][2] = 'All Jobs';

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
                	<a href="careers-new"><b>Add New Job</b></a>
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
			$totalno = mysql_query("SELECT COUNT(*) FROM careers");
			list($total_rows) = mysql_fetch_array($totalno);
			//to make pagination
			$statement = "`careers`";
		 	$myquery = "SELECT a.*, b.usernames as 'createby' FROM careers a, adminuser b 
				WHERE a.status != '' AND a.createdby = b.id ORDER BY id ASC LIMIT ".$offset."," .PAGE_LIMIT;
			$displayMsg = "Careers";
			$nullMsg = "No job was found.";	

			$list = mysql_query($myquery);	
			
			//$list = mysql_query($myquery);
			$countlist = @mysql_num_rows($list);
		
			$i=1;
?>
<? if($countlist > 0){?>

<form name="viewaccounts" id="viewaccounts" method="post" action="controller" onsubmit="return deletepost(this)">
    <table width="100%" border="0" align="center" class="tablet4" cellspacing="0">
  			<tr>
            	<td align="left" colspan="2">
                	<input type='hidden' name='action' value='delete-jobs'/>
 					<input type='submit' name='cmdRegister' id='submit' class="mybutton" value='Delete Selected Records' title='click to delete selected messages'/>
                </td>
                <td align="right"><strong><?=$displayMsg.": ".$total_rows?></strong></td>	
            </tr>
   </table>
   <br>
  <table cellpadding="0" cellspacing="0" border="0" class="mytable" id="datalist">
  
        <thead>
 			 <tr class="gradeA">
                 <th class="listHeadColumn" align="center"><label><input type="checkbox" style="cursor:pointer" name="deleteallpost" id="select_all" title="toggle all selection"/></label>
                </th>
                <th align="left">Title</th>
                <th align="left">Created On</th>
                <th align="left">Created By</th>
                <th align="left">Status</th>
                <th align="left">Action</th>
                <th align="left"></th>
           </tr>
           </thead>
 	<? while(@$record = mysql_fetch_assoc($list)){?>
 		<tr <?=($i%2?"class='light'":"class='dark'")?>>
        	<td align='center'><input type='checkbox' class="checkbox" id='course[]' name='messages[]' style="cursor:pointer" value='<?=$record['id']?>'></td>        	<td align='left'><B><?=$record["title"]?></B></td>
            <td align='left'><B><?=$record["createdon"]?></B></td>
            <td align='left'><B><?=$record["createby"]?><B></td>
            <td align='center'><?=$record["status"]=="ACTIVE"?"Active":"Inactive"?></td>   
            <td align="center"><a class="modhomelinks" href='career-update?id=<?=$record["id"]?>' title = 'click to view'>Edit</a></td> 
            <td align="center"><a class="modhomelinks" href='applications-list?id=<?=$record["id"]?>' title = 'click to view'>Applications</a></td>       
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
navigation ($offset,"careers-list",$total_rows,$url);?>				
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
getSiteFooter($web_data);
?>