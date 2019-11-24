<?php
require_once("functions.php");
mustLogin("ADMIN");
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="Settings Page";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);

$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = '';
$crumb[1][1] = 'settings page';
$crumb[1][2] = 'Settings Page';

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
                <h4 class="classic-title"><span>Settings Page</span>
                	<span style="float:right">
                		<a href="settings"><b>See All Settings</b></a>
                    </span>
                </h4>
                
				<!-- Start Contact Form -->

    
    <div class="tabs-section">
        
        <!-- Nav Tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-gear"></i>Basic Settings</a></li>
            <li><a href="#tab-2" data-toggle="tab"><i class="fa fa-square-o"></i>Layout Setting</a></li>
            <li><a href="#tab-3" data-toggle="tab"><i class="fa fa-list-alt"></i>Top Bar Color</a></li>
			<li><a href="#tab-4" data-toggle="tab"><i class="fa fa-file-text"></i>Website Colour</a></li>
            <li><a href="#tab-5" data-toggle="tab"><i class="fa fa-cloud-upload"></i>School Uploads</a></li>
        </ul>
        
        <!-- Tab panels -->
        <div class="tab-content">
            <!-- Tab Content 1 -->
            <div class="tab-pane fade in active" id="tab-1">
		<h4 class="classic-title"><span>Configure Basic Settings For Website</span></h4>
        
     <form role="form" class="contact-form" id="contact-form" method="post" action="controller">

    <div class="form-group">
    <div class="controls">
    <input type="text" name="caption" title="enter settings name" required="required" class="email" placeholder="Settings Caption:"/>
     
    </div>
    </div>

    <div class="form-group">
    <div class="controls">
		<textarea rows="7"  placeholder="Settings Content:" name="content"></textarea>     
    </div>
    </div>


     <input type="hidden" name="action" value="setting-new" />
     <input type="hidden" name="settingtype" value="1" />
     
    <button type="submit" id="submit" class="btn btn-base">Save</button>
    
    <button type="button" id="submit" class="btn btn-light" onClick="parent.location='cpanel-home'">Cancel</button><div id="success" style="color:#34495e;"></div>
    
    </form>
                 
            </div>
            <!-- Tab Content 2 -->
            <div class="tab-pane fade" id="tab-2">
				
                <h4 class="classic-title"><span>Configure Settings For Layout Style</span></h4>
                
     <form role="form" class="contact-form" id="contact-form" method="post" action="controller">

	<div class="form-group">
    <div class="controls">
    <input type="text" name="caption" readonly value="Website_Layout" class="email" placeholder="Website Layout"/>
     
    </div>
    </div>
	
    <div class="form-group">
    <div class="controls">
    
 <select name="content" id="layout-style" class="layout-style email">
     <option value="1" <?=$web_data['Website_Layout']==1?"selected":""?>>Wide</option>
     <option value="2" <?=$web_data['Website_Layout']==2?"selected":""?>>Boxed</option>
 </select>
     
    </div>
    </div>


     <input type="hidden" name="action" value="setting-new" />
     <input type="hidden" name="settingtype" value="2" />
    <button type="submit" id="submit" class="btn btn-base">Save</button>
    
    <button type="button" id="submit" class="btn btn-light" onClick="parent.location='cpanel-home'">Cancel</button><div id="success" style="color:#34495e;"></div>
    
    </form>
                
            </div>
            <!-- Tab Content 3 -->
            <div class="tab-pane fade" id="tab-3">

<h4 class="classic-title"><span>Configure Settings For Top Bar Colour</span></h4>

     <form role="form" class="contact-form" id="contact-form" method="post" action="controller">

	<div class="form-group">
    <div class="controls">
    <input type="text" name="caption" readonly value="Top_Bar_Color" class="email" placeholder="Top Bar Color"/>
     
    </div>
    </div>
	
    <div class="form-group">
    <div class="controls">
    
 <select name="content" id="topbar-style" class="topbar-style email">
     <option value="1" <?=$web_data['Top_Bar_Color']==1?"selected":""?>>Light (Default)</option>
     <option value="2" <?=$web_data['Top_Bar_Color']==2?"selected":""?>>Dark</option>
     <option value="3" <?=$web_data['Top_Bar_Color']==3?"selected":""?>>Color</option>
 </select>
     
    </div>
    </div>


     <input type="hidden" name="action" value="setting-new" />
     <input type="hidden" name="settingtype" value="3" />
    <button type="submit" id="submit" class="btn btn-base">Save</button>
    
    <button type="button" id="submit" class="btn btn-light" onClick="parent.location='cpanel-home'">Cancel</button><div id="success" style="color:#34495e;"></div>
    
    </form>

                 
            </div>





<div class="tab-pane fade" id="tab-4">

<h4 class="classic-title"><span>Configure Settings For Website Colour</span></h4>

     <form role="form" class="contact-form" id="contact-form" method="post" action="controller">

	<div class="form-group">
    <div class="controls">
    <input type="text" name="caption" readonly value="Website_Color" class="email" placeholder="Website Color"/>
     
    </div>
    </div>
	
    <div class="form-group">
    <div class="controls">
    
 <select name="content" id="websitecolor" class="email" onChange="setActiveStyleSheet(document.getElementById('websitecolor').value); return false;">
     <option value="global-style-blue" <?=$web_data['Website_Color']=="global-style-blue"?"selected":""?>>Blue</option>
     <option value="global-style-green" <?=$web_data['Website_Color']=="global-style-green"?"selected":""?>>Green</option>
     <option value="global-style-red" <?=$web_data['Website_Color']=="global-style-red"?"selected":""?>>Red</option>
     <option value="global-style-violet" <?=$web_data['Website_Color']=="global-style-violet"?"selected":""?>>Violet</option>
     <option value="global-style-yellow" <?=$web_data['Website_Color']=="global-style-yellow"?"selected":""?>>Yellow</option>
 </select>
     
    </div>
    </div>


     <input type="hidden" name="action" value="setting-new" />
     <input type="hidden" name="settingtype" value="4" />
    <button type="submit" id="submit" class="btn btn-base">Save</button>
    
    <button type="button" id="submit" class="btn btn-light" onClick="parent.location='cpanel-home'">Cancel</button><div id="success" style="color:#34495e;"></div>
    
    </form>
</div>

<div class="tab-pane fade" id="tab-5">

<h4 class="classic-title"><span>Configure Settings For School Uploads</span></h4>

     <form role="form" class="contact-form" id="contact-form" method="post" action="controller" enctype="multipart/form-data">

	<div class="form-group">
    <div class="controls">
 <select name="caption" id="upload_type" class="email">
     <option value="School_Logo">School Logo</option>
     <option value="School_Favicon">School Favicon</option>
     <option value="Wesbite_BG">Website Background</option>
     <option value="Banner_BG">Banner Background</option>
 </select>
    </div>
    </div>
	
    <div class="form-group">
    <div class="controls">
		<input type="file" name="photo" title="show upload dialog" class="email" />
    </div>
    </div>

    <div class="form-group">
    <div class="controls">
		<label onClick="if(document.getElementById('check_resize').checked){document.getElementById('show_resize').style.display='block';}else{document.getElementById('show_resize').style.display='none';}">Resize Picture?
<input type="checkbox" style="cursor:pointer" name="remember" onClick="" id="check_resize"/>
	</label>
    </div>
    </div>

    <div class="form-group" id="show_resize" style="display:none">
    <div class="controls">
		<input type="text" name="width" placeholder="width" style="width:100px"/> * <input type="text" name="height" placeholder="Height" style="width:100px;"/>
    </div>
    </div>


     <input type="hidden" name="action" value="upload-new" />
     <input type="hidden" name="settingtype" value="5" />
    <button type="submit" id="submit" class="btn btn-base">Save</button>
    
    <button type="button" id="submit" class="btn btn-light" onClick="parent.location='cpanel-home'">Cancel</button><div id="success" style="color:#34495e;"></div>
    
    </form>

                 
</div>            
            
            
            
                    </div>
        <!-- End Tab Panels -->

</div>
     
     
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