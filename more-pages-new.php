<?php
require_once("functions.php");
mustLogin("ADMIN");
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="Create New Page";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
getTinyMCEScript("advanced");
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = '';
$crumb[1][1] = 'new page';
$crumb[1][2] = 'New Page';

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
                <h4 class="classic-title"><span>Create New Page</span>
                <span style="float:right">
               		<a href="more-pages-list"><b>Show All Pages</b></a>
                </span>
                </h4>
                
                
				<!-- Start Contact Form -->
 
     
<form id="postform" name="postform" method="post" action="controller" enctype="multipart/form-data">
    <table class="" width="100%" align="center">

  <tr>
    <td align="left" width="25%">Select Page Category</td>
    <td align="left">
<select name="category" class="email" title="select page category">
	<option value="">Select Page Category</option>
    <option value="index">Home</option>
    <option value="about">About</option>     
    <option value="academics">Academics</option> 
    <option value="admission">Admission</option>     
    <option value="more">More</option>     
</select>
          </td>
  </tr>

    <tr>
    <td width="25%" align="left" class="leftTd">Page Title:</td>
    <td width="75%" align="left">
      <input type="text" name="caption" required class="email" title="enter the page name">
    </td>
    </tr>

    <tr>
    <td width="25%" align="left" class="leftTd">URL Content:</td>
    <td width="75%" align="left">
      <input type="text" name="url_content" required class="email" title="enter url content for this page">
    </td>
    </tr>

  <tr>
    <td align="left" width="25%">Select Link Location</td>
    <td align="left">
<select name="link_location" class="email" title="select link location">
	<option value="1">Only Top Link</option>     
    <option value="2">Top & Right Link</option> 
</select>
          </td>
  </tr>

  <tr>
    <td align="left" width="25%"> Home Tab Location</td>
    <td align="left">
<select name="home_tab" class="email" title="select if this page shows in home page tab">
	<option value="0">None</option>
	<option value="1A">Tab 1 Side A</option>
    <option value="1B">Tab 1 Side B</option>
    <option value="1C">Tab 1 Side C</option>
    <option value="1D">Tab 1 Side D</option>
         
    <option value="2">Tab 2</option> 
	<option value="3">Tab 3</option>     
    <option value="4">Tab 4</option> 
</select>
          </td>
  </tr>

	<tr>
    	<td class="leftTd" align="left">Page Content:</td>
    <td align="left">
    <textarea name="content" id="description" cols="45" rows="3" class="email" title="enter page content"></textarea>
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
    <input type="hidden" name="action" value="create-new-page" />
<input type='button' id='mybutton' value='Cancel' title='click to cancel' onclick="parent.location='cpanel-home'">
    </td></tr>
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
getSiteFooter($web_data,0);
?>