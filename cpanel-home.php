<?php
require_once("functions.php");
mustLogin("");
$web_data = getWebsiteData();
$links = getAllLinks();
$u = $_SESSION['wtsession'];
require_once("pagelayout.php");

$title="cPanel";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);

$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';

getPageBanner($title,$crumb,$web_data);
?>


<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row sidebar-page">
            
            
            <!-- Page Content -->
            <div class="col-md-9 page-content">

               <? callErrorMessage();?>
 
                <!-- Classic Heading
                <h4 class="classic-title"><span>Control Panel</span></h4> -->
                
				<!-- Start Contact Form -->

                                
    <div class="row">
        


	<?	if($u->usertype=="ADMIN"){?>
  		
        <section class="slice light-gray bb">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                  <a href="setting-new">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-cog"></i>
                            </div>
                            
                            <h2>Add New Basic Setting</h2>
                        </div>
                    </div>
                  </a>
                  <a href="settings">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-cog"></i>
                            </div>
                            
                            <h2>Show All Basic Settings</h2>
                        </div>
                    </div>
                  </a>
                  <a href="more-pages-new">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-book"></i>
                            </div>
                            
                            <h2>Add New Pages</h2>
                        </div>
                    </div>
                  </a>
                  <a href="more-pages-list">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-book"></i>
                            </div>
                            
                            <h2>See All Pages</h2>
                        </div>
                    </div>
                  </a>
                </div>

            </div>
        </div>
    </section>
  
  	<section class="slice light-gray bb">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                  <a href="testimonies-new">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-pencil"></i>
                            </div>
                            
                            <h2>Add New Testimony</h2>
                        </div>
                    </div>
                  </a>
                  <a href="testimonies-list">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-pencil"></i>
                            </div>
                            
                            <h2>See All Testimonies</h2>
                        </div>
                    </div>
                  </a>
                  <a href="carousel-new">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-film"></i>
                            </div>
                            
                            <h2>Add New Carousel Picture</h2>
                        </div>
                    </div>
                  </a>
                  <a href="carousel-list">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-film"></i>
                            </div>
                            
                            <h2>See All Carousel Pictures</h2>
                        </div>
                    </div>
                  </a>
                </div>

            </div>
        </div>
    </section>
    
    <section class="slice light-gray bb">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                  <a href="social-media-new">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-thumbs-up"></i>
                            </div>
                            
                            <h2>Add/Update Social Media Link</h2>
                        </div>
                    </div>
                  </a>
                  <a href="social-media-list">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-thumbs-up"></i>
                            </div>
                            
                            <h2>See All Social Media Links</h2>
                        </div>
                    </div>
                  </a>
         <?	}?>
                  <a href="content-update?option=news">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-bullhorn"></i>
                            </div>
                            
                            <h2>Add News / Annoucement</h2>
                        </div>
                    </div>
                  </a>
                  <a href="content-list">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-bullhorn"></i>
                            </div>
                            
                            <h2>Show All News / Announcements</h2>
                        </div>
                    </div>
                  </a>
                </div>

            </div>
        </div>
    </section>
    
    <section class="slice light-gray bb">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                  <a href="newsletter">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-users"></i>
                            </div>
                            
                            <h2>See All Newsletter Subscribers</h2>
                        </div>
                    </div>
                  </a>
                  <a href="folder-new">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-folder-open"></i>
                            </div>
                            
                            <h2>Add New Photo Album</h2>
                        </div>
                    </div>
                  </a>
                  <a href="folder-list">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-file-image-o"></i>
                            </div>
                            
                            <h2>List All Photo Albums</h2>
                        </div>
                    </div>
                  </a>
                  <a href="pictures-new">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-file-image-o"></i>
                            </div>
                            
                            <h2>Add New Album Picture</h2>
                        </div>
                    </div>
                  </a>
                </div>

            </div>
        </div>
    </section>
    
    <section class="slice light-gray bb">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                  <a href="careers-new">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-suitcase"></i>
                            </div>
                            
                            <h2>Add new job post</h2>
                        </div>
                    </div>
                  </a>
                  <a href="careers-list">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-suitcase"></i>
                            </div>
                            
                            <h2>List all job posts</h2>
                        </div>
                    </div>
                  </a>
                  <a href="contact-messages">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-envelope"></i>
                            </div>
                            
                            <h2>Show All Contact Messages</h2>
                        </div>
                    </div>
                  </a>
                  <a href="password-update">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-lock"></i>
                            </div>
                            
                            <h2>Update Admin Password</h2>
                        </div>
                    </div>
                  </a>
                </div>

            </div>
        </div>
    </section>
    
    <section class="slice light-gray bb">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                  <a href="upload-new">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-upload"></i>
                            </div>
                            
                            <h2>Upload New File</h2>
                        </div>
                    </div>
                  </a>
				  <a href="homebox">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-pencil"></i>
                            </div>
                            
                            <h2>Home Page Boxes</h2>
                        </div>
                    </div>
                  </a>
                  <a href="logout">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="cursor:pointer">
                            <div class="thmb-img">
                                <i class="fa fa-power-off"></i>
                            </div>
                            
                            <h2>Logout</h2>
                        </div>
                    </div>
                  </a>
                </div>

            </div>
        </div>
    </section>
        
    </div>
     
     
     
     
     
     
				<!-- End Contact Form -->
                 
                
                <!-- Divider -->
                <div class="hr5" style="margin-top:30px; margin-bottom:45px;"></div>




            </div>
            <!-- End Page Content-->
            

<?	//getSideBar($links)?>            
            
        </div>
    </div>
</div>
<!-- End Content -->


<?php
getSiteFooter($web_data);
?>