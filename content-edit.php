<?php
require_once("functions.php");
mustLogin();
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="News Update";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
getTinyMCEScript("simple");
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = 'content-list';
$crumb[1][1] = 'news list';
$crumb[1][2] = 'News';
$crumb[2][0] = '';
$crumb[2][1] = 'news update';
$crumb[2][2] = 'Update';

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
                <h4 class="classic-title"><span>News Update</span></h4>
                
				<!-- Start Contact Form -->

    <? 
		if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] >= 0){		
			$fid = addslashes($_GET['id']);
			$news = getNewsById($fid);
	?>    
    
    <? if ($news == 0){#That is if no result was obtained?>
    		<div class="portlet-msg-info">Sorry no result was found for your search</div>
<?
	}else{
	?>

<form id="postform" name="postform" method="post" action="controller" enctype="multipart/form-data">
    <table class="" width="100%" align="center">
    <?	if($news['upload']!=""){?>
    <tr>
    <td>&nbsp;</td>
    <td align="left">
      <img src="<?=$news['upload']?>" width="200" height="200">
    </td>
    </tr>
	<? 	}?>
    <tr>
    <td width="25%" align="left" class="leftTd">News Caption:</td>
    <td width="75%" align="left">
      <input type="text" name="caption" class="smalltxt" title="enter the folder caption" style="width:290px" value="<?=$news['caption']?>">
    </td>
    </tr>
	<tr>
		<td align="left">Display In:</td>
		<td align="left">
			<select name="display" class="smalltxt">
				<option value="home" <?=$news['updatemode']=="home"?"selected":""?>>Home page (As POP UP)</option>
				<option value="other" <?=$news['updatemode']=="other"?"selected":""?>>Other pages</option>
			</select>
		</td>
	</tr>
    <tr>
    <td class="leftTd" align="left">Content:</td>
    <td align="left">
    <textarea name="description" id="description" cols="45" rows="3" class="smallTxtArea" title="news content" style="width:290px"><?=$news['content']?></textarea>
	</td>
    </tr>
    
  <tr>
    <td align="left" width="10%">Change Picture:</td>
    <td align="left">
<input type="file" name="photo" title="show upload dialog" class="email" style="width:290px" />
	</td>
  </tr>
  <tr>                
    <td align="left" colspan="2">&nbsp;
    </td>
  </tr>

  <tr>
    <td align="left">
    	<label onClick="if(document.getElementById('check_resize').checked){document.getElementById('show_resize').style.display='block';}else{document.getElementById('show_resize').style.display='none';}">Resize Picture?
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
     
    <tr><td>&nbsp;</td><td align="left">
    <input type="submit" name="createcat" id="mybutton" title="click to save" value="Save" />&nbsp;
    <input type="hidden" name="action" value="update-news" />
    <input type="hidden" name="id" value="<?=$fid?>">
<input type='button' id='mybutton' value='Cancel' title='click to cancel' onclick="parent.location='content-list'">
    </td></tr>
    </table>

  </form>

     <? }?>
	<? }else{?>
    		<div class="portlet-msg-alert">Please Enter a Valid Photo-Album ID to View This Page</div>
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
getSiteFooter($web_data,0);
?>