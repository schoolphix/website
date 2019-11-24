<?php
require_once("functions.php");
mustLogin("ADMIN");
$web_data = getWebsiteData();
$links = getAllLinks();
define("PAGE_LIMIT",30);
require_once("pagelayout.php");

$title="Pages";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
getDeleteConfirmation(1,"Selected pages will be deleted. Continue?");
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = '';
$crumb[1][1] = 'pages';
$crumb[1][2] = 'Pages';

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
                	<a href="more-pages-new"><b>Add New Page</b></a>
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
			$totalno = mysql_query("SELECT COUNT(*) FROM morepages");
			list($total_rows) = mysql_fetch_array($totalno);
			//to make pagination
			$statement = "`morepages`";
		 	$myquery = "SELECT * FROM morepages ORDER BY category ASC LIMIT ".$offset."," .PAGE_LIMIT;
			$displayMsg = "Pages";
			$nullMsg = "No page was found.";	

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
                	<input type='hidden' name='action' value='delete-page'/>
 					<input type='submit' name='cmdRegister' id='submit' class="mybutton" value='Delete Selected Pages' title='click to delete selected messages'/>
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
                <th align="left">Caption</th>
                <th align="left">Category</th>
                <th align="left">Link</th>
                <th align="left">Location</th>
                <th align="left">Home Tab?</th>
                <th align="left">Picture</th>
                <th align="left">Status</th>
           </tr>
           </thead>
 	<? while(@$record = mysql_fetch_assoc($list)){?>
 		<tr <?=($i%2?"class='light'":"class='dark'")?>>
        	<td align='center'><input type='checkbox' class="checkbox" id='course[]' name='messages[]' style="cursor:pointer" value='<?=$record['id']?>'></td>        	
            <td align='left'><B><a class="modhomelinks" href='more-page-details?id=<?=$record["id"]?>' title = 'click to view' style="color:#000000"><?=$record["caption"]?></a></B></td>
            <td align='left'><?=ucwords(strtolower($record["category"]))?></td>
            <td align='left'><a class="modhomelinks" href='<?=$record["category"]."?".$record["url_content"]?>' title = 'click to view' style="color:#000000">See Live Page</a></td>
            <td align='center'>
				<?	
					if($record["link_location"]=="1"){
						echo "Only Top Link";
					}elseif($record["link_location"]=="2"){
						echo "Top & Right Link";
					}
				
				?>
            </td>
            <td align='center'>
			<?	
                if($record["home_tab"]=="0"){
                    echo "None";
                }elseif($record["home_tab"]=="1A"){
                    echo "Tab 1 Side A";
                }elseif($record["home_tab"]=="1B"){
                    echo "Tab 1 Side B";
                }elseif($record["home_tab"]=="1C"){
                    echo "Tab 1 Side C";
                }elseif($record["home_tab"]=="1D"){
                    echo "Tab 1 Side D";
                }elseif($record["home_tab"]=="2"){
                    echo "Tab 2";
                }elseif($record["home_tab"]=="3"){
                    echo "Tab 3";
                }elseif($record["home_tab"]=="4"){
                    echo "Tab 4";
                }
            
            ?>
            </td>
            <td align='center'><?=$record["picture_url"]!=""?"Yes":"No"?></td>
            <td align='center'><?=$record["active_status"]=="1"?"Active":"Inactive"?></td>          
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
navigation ($offset,"contact-messages",$total_rows,$url);?>				
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