<?php
require_once("functions.php");
mustLogin("ADMIN");
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="Carousel Details";

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
$crumb[1][0] = 'carousel-list';
$crumb[1][1] = 'carousel';
$crumb[1][2] = 'All Carousels';
$crumb[2][0] = '';
$crumb[2][1] = 'details';
$crumb[2][2] = 'Details';

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
                <h4 class="classic-title"><span>Carousel Details</span></h4>
                
				<!-- Start Contact Form -->

    <? 
		if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] >= 0){		
			$fid = addslashes($_GET['id']);
			$folder = getCarouselById($fid);
	?>    
    
    <? if ($folder == 0){#That is if no result was obtained?>
    		<div class="portlet-msg-info">Sorry no result was found for your search</div>
<?
	}else{
	?>

<form id="postform" name="postform" method="post" action="controller" enctype="multipart/form-data">
    <table class="mytable" width="100%" align="center">
    <?	if($folder['picture_url']!=""){?>
    <tr>
    <td>&nbsp;</td>
    <td align="left">
      <img src="<?=$folder['picture_url']?>" width="200" height="200">
    </td>
    </tr>
	<? 	}?>
    <tr>
    <td width="25%" align="left" class="leftTd">Caption:</td>
    <td width="75%" align="left">
    	<textarea name="caption" title="enter carousel caption" rows="1" cols="50"><?=$folder['caption']?></textarea>
    </td>
    </tr>
  <tr>
    <td align="left" width="25%">Carousel Status</td>
    <td align="left">
		<select name="active_status" class="email" style="width:400px">
	<option value="1" <?=$folder['active_status']=="1"?"selected":""?>>Active</option>     
    <option value="2" <?=$folder['active_status']=="2"?"selected":""?>>Inactive</option> 
		</select>
      </td>
  </tr>
  <tr>
    <td align="left" width="10%">Change Picture:</td>
    <td align="left">
<input type="file" name="photo" title="show upload dialog" class="email" style="width:400px" />
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
  <tr>
  	<td>&nbsp;</td><td align="left">
    <input type="submit" name="createcat" id="mybutton" title="click to save" value="Save" />&nbsp;
    <input type="hidden" name="action" value="update-carousel" />
    <input type="hidden" name="id" value="<?=$fid?>">
<input type='button' id='mybutton' value='Cancel' title='click to cancel' onclick="parent.location='carousel-list'">
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
getSiteFooter($web_data);
?>