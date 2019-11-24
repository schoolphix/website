<?php
require_once("functions.php");
mustLogin("ADMIN");
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="Page Details";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
getTinyMCEScript("advanced");
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = 'more-pages-list';
$crumb[1][1] = 'pages';
$crumb[1][2] = 'Pages';
$crumb[2][0] = '';
$crumb[2][1] = 'page details';
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
                <h4 class="classic-title"><span>Page Details</span>
                 <span style="float:right">
                	<a href="more-pages-list"><b>See All Pages</b></a>
                 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                	<a href="more-pages-new"><b>Add New Page</b></a>
                </span>
                </h4>
                
				<!-- Start Contact Form -->

    <? 
		if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] >= 0){		
			$pid = addslashes($_GET['id']);
			$page = getMorePageDetails("id",$pid);
	?>    
    
    <? if ($page == 0){#That is if no result was obtained?>
    		<div class="portlet-msg-info">Sorry no result was found for your search</div>
<?
	}else{
	?>

     
<form id="postform" name="postform" method="post" action="controller" enctype="multipart/form-data">
    <table class="" width="100%" align="center">
    
    <?	if($page['picture_url']!=""){?>
    <tr>
    <td>&nbsp;</td>
    <td align="left">
      <img src="<?=$page['picture_url']?>" width="200" height="200">
    </td>
    </tr>
	<? 	}?>
    
  <tr>
    <td align="left" width="25%">Page Category</td>
    <td align="left">
<select name="category" class="email" title="select page category">
	<option value="">Select Page Category</option>
    <option value="index" <?=$page['category']=="index"?"selected":""?>>Home</option>
    <option value="about" <?=$page['category']=="about"?"selected":""?>>About</option>     
    <option value="academics" <?=$page['category']=="academics"?"selected":""?>>Academics</option> 
    <option value="admission" <?=$page['category']=="admission"?"selected":""?>>Admission</option>     
    <option value="more" <?=$page['category']=="more"?"selected":""?>>More</option>     
</select>
          </td>
  </tr>

    <tr>
    <td width="25%" align="left" class="leftTd">Page Title:</td>
    <td width="75%" align="left">
      <input type="text" name="caption" required class="email" title="enter the folder caption" value="<?=$page['caption']?>">
    </td>
    </tr>

    <tr>
    <td width="25%" align="left" class="leftTd">URL Content:</td>
    <td width="75%" align="left">
      <input type="text" name="url_content" required class="email" value="<?=$page['url_content']?>" title="enter url content for this page">
    </td>
    </tr>

  <tr>
    <td align="left" width="25%">Select Link Location</td>
    <td align="left">
<select name="link_location" class="email">
	<option value="1" <?=$page['link_location']=="1"?"selected":""?>>Only Top Link</option>     
    <option value="2" <?=$page['link_location']=="2"?"selected":""?>>Top & Right Link</option> 
</select>
          </td>
  </tr>

  <tr>
    <td align="left" width="25%"> Home Page Tab Location</td>
    <td align="left">
<select name="home_tab" class="email" title="home page tab">
	<option value="0" <?=$page['home_tab']=="0"?"selected":""?>>None</option>

	<option value="1A" <?=$page['home_tab']=="1A"?"selected":""?>>Tab 1 Side A</option>     
	<option value="1B" <?=$page['home_tab']=="1B"?"selected":""?>>Tab 1 Side B</option>     
	<option value="1C" <?=$page['home_tab']=="1C"?"selected":""?>>Tab 1 Side C</option>     
	<option value="1D" <?=$page['home_tab']=="1D"?"selected":""?>>Tab 1 Side D</option>     

    <option value="2" <?=$page['home_tab']=="2"?"selected":""?>>Tab 2</option> 
	<option value="3" <?=$page['home_tab']=="3"?"selected":""?>>Tab 3</option>     
    <option value="4" <?=$page['home_tab']=="4"?"selected":""?>>Tab 4</option> 
</select>
          </td>
  </tr>

  <tr>
    <td align="left" width="25%">Page Status</td>
    <td align="left">
<select name="active_status" class="email">
	<option value="1" <?=$page['active_status']=="1"?"selected":""?>>Active</option>     
    <option value="2" <?=$page['active_status']=="2"?"selected":""?>>Inactive</option> 
</select>
          </td>
  </tr>

	<tr>
    	<td class="leftTd" align="left">Page Content:</td>
    <td align="left">
    <textarea name="content" id="description" cols="45" rows="3" class="email" title="describe this category"><?=$page['content']?></textarea>
	</td>
    </tr>


  <tr>
    <td align="left" width="10%">Upload Picture (Optional)<br>
    <span style="color:#00f;font-weight:bold">Jpeg, Gif or Png (5MB Max)</span> 
    </td>
    <td align="left">
    <br>
<input type="file" name="photo" title="upload picture (optional)" class="email" />
	</td>
  </tr>


  <tr>
    <td align="left" width="10%">
    	<label onClick="if(document.getElementById('check_resize').checked){document.getElementById('show_resize').style.display='block';}else{document.getElementById('show_resize').style.display='none';}">Resize Picture?
<input type="checkbox" style="cursor:pointer" name="remember" onClick="" id="check_resize"/>
	</label>
    </td>
    <td>&nbsp;</td>
 </tr>

  <tr>
    <td>&nbsp;</td>
    <td align="left" width="10%">
    <div class="form-group" id="show_resize" style="display:none">
    <div class="controls">
		<input type="text" name="width" placeholder="width" style="width:100px"/> * <input type="text" name="height" placeholder="Height" style="width:100px;"/>
    </div>
    </div>
    	
    </td>
 </tr>



    <tr><td>&nbsp;</td><td align="left">
    <input type="submit" name="createcat" id="mybutton" title="click to save" value="Save" />&nbsp;
    <input type="hidden" name="action" value="update-page-details" />
    <input type="hidden" name="id" value="<?=$pid?>" />
<input type='button' id='mybutton' value='Cancel' title='click to cancel' onclick="parent.location='more-pages-list'">
    </td></tr>
    </table>

  </form>
 




     <? }?>
	<? }else{?>
    		<div class="portlet-msg-alert">Please Enter a Valid Page ID to View This Page</div>
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