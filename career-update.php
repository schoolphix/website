<?php
require_once("functions.php");
mustLogin();
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="Career Update";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = 'careers-list';
$crumb[1][1] = 'careers list';
$crumb[1][2] = 'Career List';
$crumb[2][0] = '';
$crumb[2][1] = 'career update';
$crumb[2][2] = 'Career Update';

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
                <h4 class="classic-title"><span>Career Update</span></h4>
                
				<!-- Start Contact Form -->

    <? 
		if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] >= 0){		
			$fid = addslashes($_GET['id']);
			$job = getJobById($fid);
	?>    
    
    <? if ($job == 0){#That is if no result was obtained?>
    		<div class="portlet-msg-info">Sorry no result was found for your search</div>
<?
	}else{
	?>

<form id="postform" name="postform" method="post" action="controller">
    <table class="mytable" width="100%" align="center">
    <tr>
    <td width="25%" align="left" class="leftTd">Job Title*:</td>
    <td width="75%" align="left">
      <input type="text" name="caption" class="smalltxt" title="enter the folder caption" style="width:290px" value="<?=$job['title']?>">
    </td>
    </tr>
    <tr>
    <td class="leftTd" align="left">Job Description*:</td>
    <td align="left">
    <textarea name="description" id="description" cols="45" rows="3" class="smallTxtArea" title="enter job description" style="width:290px"><?=$job['description']?></textarea>
	</td>
    </tr>
    <tr>
    <td class="leftTd" align="left">Job Requirements*:</td>
    <td align="left">
    <textarea name="requirements" id="requirements" cols="45" rows="3" class="smallTxtArea" title="describe this category" style="width:290px"><?=$job['requirements']?></textarea>
	</td>
    </tr>
    <tr>
    <td class="leftTd" align="left">Status*:</td>
    <td align="left">
    <select name="status" class="email" style="width:300px">
	<option value="ACTIVE" <?=$job['status']=="ACTIVE"?"selected":""?>>Active</option>     
    <option value="INACTIVE" <?=$job['status']=="INACTIVE"?"selected":""?>>Inactive</option> 
		</select>
	</td>
    </tr>
    <tr><td>&nbsp;</td><td align="left">
    <input type="submit" name="createcat" id="mybutton" title="click to save" value="Save" />&nbsp;
    <input type="hidden" name="action" value="update-job" />
    <input type="hidden" name="id" value="<?=$fid?>">
<input type='button' id='mybutton' value='Cancel' title='click to cancel' onclick="parent.location='folder-list'">
    </td></tr>
    </table>

  </form>

     <? }?>
	<? }else{?>
    		<div class="portlet-msg-alert">Please Enter a Valid Job ID to View This Page</div>
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